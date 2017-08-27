<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 15.06.16
 * Time: 14:18
 */

namespace app\controllers;


use app\models\category\Category;
use app\models\elasticsearch\node\ElasticNode;
use app\models\file\File;
use app\models\forms\RequestForm;
use app\models\node\Article;
use app\models\node\ArticleSearch;
use app\models\node\News;
use app\models\node\Video;
use app\models\node\Node;
use app\models\node\NodeSearch;
use app\models\node\OnlinePolicy;
use app\models\node\Policy;
use app\models\node\Type;
use app\models\tag\Tag;
use app\modules\admin\models\Profile;
use app\modules\admin\models\ProfileSearch;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\Query;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Request;
use yii\web\Response;
use yii\web\ServerErrorHttpException;

class ApiController extends Controller {

    public function init(){

        parent::init();

        \Yii::$app->request->parsers = [
            'application/json' => 'yii\web\JsonParser',
        ];
    }

    /**
     * Endpoint for articles filter
     * @param null $id
     * @param array $filter
     * @return Node|array|null|ActiveDataProvider
     * @throws NotFoundHttpException
     */
    public function actionArticles($id = null, array $filter = []){
        \Yii::$app->response->format = Response::FORMAT_JSON;

        if($id){
            $article = Article::find()
                ->where(['id' => $id])
                ->active()
                ->one();

            if(!$article)
                throw new NotFoundHttpException();

            return $article;
        }

        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search($filter);

        return $dataProvider;
    }

    /**
     * Endpoint search tags
     * @param null $type
     * @param string $q
     * @return \app\models\tag\Tag[]|array
     */
    public function actionTags($type = null, $q = ''){
        \Yii::$app->response->format = Response::FORMAT_JSON;

        if($type){

            return Tag::find()
                ->select([Tag::tableName().'.id', 'name as text'])
                ->byEntity(sprintf('app\models\node\%s', ucfirst($type)))
                ->andFilterWhere(['like', 'name', $q])
                ->asArray()
                ->all();
        }

        return Tag::find()->andFilterWhere(['like', 'name', $q])->all();
    }

    /**
     * Отправляем заявку на емейл
     * @return string
     * @throws BadRequestHttpException
     * @throws ServerErrorHttpException
     */
    public function actionSendRequest(){
        $form = new RequestForm();

        if($form->load(\Yii::$app->request->post()) && $form->validate()){
            if(!$form->send())
                throw new ServerErrorHttpException('Mail not send!');

            return '';
        }

        throw new BadRequestHttpException();
    }

    /**
     * Endpoint for search all materials
     * @param null $id
     * @param array $filter
     * @return Node|array|null|ActiveDataProvider
     * @throws NotFoundHttpException
     */
    public function actionNodes($id = null, $type_id = null, array $filter = []){
        \Yii::$app->response->format = Response::FORMAT_JSON;


        if($id > 0){
            $node = Node::find()
                ->where(['id' => $id])
                ->active()
                ->one();

            if(!$node)
                throw new NotFoundHttpException();

            return $node;
        }elseif($type_id > 0){

            /*$type = Type::findOne($type_id);

            if(!$type)
                throw new NotFoundHttpException('Type not founded.');

            $dataProvider = null;
            if($type->code == 'article'){
                $searchModel = new ArticleSearch();
                $dataProvider = $searchModel->search($filter);
            }

            if(!$dataProvider)
                throw new NotFoundHttpException();

            $res = [];
            foreach($dataProvider->getModels() as $model){
                $res[] = [
                    'id' => $model->id,
                    'title' => $model->title,
                    'url' => $model->url,
                    'created_at' => $model->created_at,
                    'preview_text' => $model->preview_text,
                    'type' => [
                        'id' => $type->id,
                        'code' => $type->code
                    ],
                    'imageUrl' => $model->previewThumbUrl
                ];
            }

            return $res;*/
        }

        $searchModel = new NodeSearch();
        $dataProvider = $searchModel->search($filter);

        $nodeGroup = [];
        /** @var Node $node */
        foreach ($dataProvider->getModels() as $i => $node) {

            if(empty($nodeGroup[$node->type->code])) $nodeGroup[$node->type->code] = [];
            if(empty($nodeGroup[$node->type->code]['items'])) $nodeGroup[$node->type->code]['items'] = [];
            if(empty($nodeGroup[$node->type->code]['positions'])) $nodeGroup[$node->type->code]['positions'] = [];
            $nodeGroup[$node->type->code]['items'][] = $node->id;
            $nodeGroup[$node->type->code]['positions'][] = $i;
        }

        $res = [];

        $comp = Node::getCompany();

        foreach($nodeGroup as $type => $group){
            $items = [];
            if($type == 'article')
                $items = Article::find()->where(['id' => $nodeGroup[$type]['items']])->all();
            elseif($type == 'news')
                $items = News::find()
                    ->where(['id' => $nodeGroup[$type]['items']])
                    ->orderBy(['sort' => SORT_DESC, 'created_at' => SORT_DESC])
                    ->all();
            elseif($type == 'policy')
                $items = Policy::find()->where(['id' => $nodeGroup[$type]['items']])->all();
            elseif($type == 'video')
                $items = Video::find()->where(['id' => $nodeGroup[$type]['items']])->all();
/*            elseif($type == 'on-policy')
                $items = OnlinePolicy::find()->where(['id' => $nodeGroup[$type]['items']])->all();*/

            foreach($nodeGroup[$type]['positions'] as $i => $pos){
                $pos = intval($pos);
                if(empty($items[$i])) continue;
/*
                if ($type == 'news') {

                    $res[($pos+500)] = [
                        'id' => $items[$i]->id,
                        'title' => $items[$i]->title,
                        'url' => $items[$i]->url,
                        'created_at' => $items[$i]->created_at,
                        'preview_text' => $items[$i]->preview_text,
                        'type' => [
                            'id' => $items[$i]->type_id,
                            'code' => $type
                        ],
                        'category' => $items[$i]->category,
                        'author' => ''
                    ];


                    $res[($pos+500)]['imageUrl'] = $items[$i]->previewThumbUrl;


                } else {
                    */
                    $res[$pos] = [
                        'id' => $items[$i]->id,
                        'title' => $items[$i]->title,
                        'url' => $items[$i]->url,
//                        'created_at' => $items[$i]->created_at,
                        'created_at' => \Yii::$app->formatter->asDate($items[$i]->created_at, 'php:d F Y'),
                        'preview_text' => $items[$i]->preview_text,
                        'type' => [
                            'id' => $items[$i]->type_id,
                            'code' => $type
                        ],
                        'category' => $items[$i]->category,
                        'category2' => $items[$i]->category2,
                        'author' => ''
                    ];
//                }

  
                if($type == 'article'){
                    $res[$pos]['imageUrl'] = $items[$i]->previewThumbUrl;
                    $res[$pos]['author'] = $items[$i]->author;
                }
                elseif($type == 'news'){
                    $res[$pos]['imageUrl'] = $items[$i]->previewThumbUrl;
                    $res[$pos]['comp'] = 'ООО '.$comp[intval($items[$i]->rating)];
                    $res[$pos]['comp_num'] = intval($items[$i]->rating)+1;
                    $res[$pos]['pub_dat_m'] = \Yii::$app->formatter->asDatetime($items[$i]->created_at, 'php:m');
                    $res[$pos]['pub_dat_y'] = \Yii::$app->formatter->asDatetime($items[$i]->created_at, 'php:Y');
                }
                elseif($type == 'video'){
                    $res[$pos]['videocat'] = $items[$i]->rating;
                } 
                elseif($type == 'policy'){
                    $res[$pos]['imageUrl'] = $items[$i]->previewImageUrl;
                    $res[$pos]['preview_text'] = $items[$i]->short_text;
                    $res[$pos]['company'] = 'ООО '.$comp[intval($items[$i]->rating)];
                }
            }
        }


        ksort($res);

        $res_news = [];
        $res_video = [];
        $res_2 = [];



        foreach($res as $val) {

            if ($val['type']['code'] == 'news') {
                $res_news[] = $val;

            } elseif($val['type']['code'] == 'video') {

                $res_video[] = $val;

            }else {
                $res_2[] = $val;
            }
        }

        foreach($res_news as $val) {
            $res_2[] = $val;
        }

        foreach($res_video as $val) {
            $res_2[] = $val;
        }

/*
        $res_2[] = [
            'id' => 1,
            'title' => '',
            'url' => 'https://mostaxi.ru/',
            'created_at' => '',
            'preview_text' => 'Программа привилегий для<br>клиентов от “МосТакси”',
            'type' => [ 'id' => 1, 'code' => 'article' ],
            'category' => null,
            'author' => ['name'=>'mostaxi.ru'],
            'imageUrl' => '/assets/images/special1.png',
            'author_c' => 'red',
        ];*/

        $res_2[] = [
            'id' => 2,
            'title' => 'Сохрани жизнь<br>природы',
            'url' => 'http://sohraniprirodu.ru/',
            'created_at' => '',
            'preview_text' => 'Национальный проект<br>Сбербанк страхование жизни',
            'type' => [ 'id' => 2, 'code' => 'article' ],
            'category' => null,
            'author' => ['name'=>'sohraniprirodu.ru'],
            'imageUrl' => '/assets/images/special2.png',
            'title_c' => 'white',
            'preview_text_c' => 'white',
            'author_c' => 'white',
        ];

        $res_2[] = [
            'id' => 3,
            'title' => '',
            'url' => 'http://spasibosberbank.ru/partners/sb_insurance/',
            'created_at' => '',
            'preview_text' => 'Бонусы СПАСИБО всем!',
            'type' => [ 'id' => 3, 'code' => 'article' ],
            'category' => null,
            'author' => ['name'=>'spasibosberbank.ru'],
            'imageUrl' => '/assets/images/special3.png',
            'preview_text_c' => 'opacity',
            'title_c' => '',
            'author_c' => '',
            'border_outer' => 'spec__border_outer',
        ];

        $res_2[] = [
            'id' => 4,
            'title' => 'Экономим<br>с ДРУГом',
            'url' => 'https://s-drugom.ru/',
            'created_at' => '',
            'preview_text' => 'Программа привилегий<br>сотрудников',
            'type' => [ 'id' => 4, 'code' => 'article' ],
            'category' => null,
            'author' => ['name'=>'s-drugom.ru'],
            'imageUrl' => '/assets/images/special4.png',
            'preview_text_c' => 'opacity',
            'title_c' => 'opacity',
            'author_c' => '',
        ];
/*
        $res_2[] = [
            'id' => 5,
            'title' => 'Корпоративное<br>страхование',
            'url' => 'http://sberbankins.ru/products/Special_offer',
            'created_at' => '',
            'preview_text' => 'Оформление полиса<br>Онлайн',
            'type' => [ 'id' => 5, 'code' => 'article' ],
            'category' => null,
            'author' => ['name'=>'SBERBANKINS.RU'],
            'imageUrl' => '/assets/images/special5.png',
            'preview_text_c' => '',
            'title_c' => 'green',
            'author_c' => '',
        ];*/

        $res_2[] = [
            'id' => 6,
            'title' => '',
            'url' => 'http://www.finprosto.ru/course/8',
            'created_at' => '',
            'preview_text' => 'Пройди курс о страховании<br>от “Финансы ПРОСТО”',
            'type' => [ 'id' => 6, 'code' => 'article' ],
            'category' => null,
            'author' => ['name'=>'finprosto.ru'],
            'imageUrl' => '/assets/images/special6.png',
            'preview_text_c' => 'white',
            'title_c' => '',
            'author_c' => 'white',
        ];


        \Yii::$app->response->headers->set('X-Pagination-Total-Count', $dataProvider->totalCount);

        return $res_2;
    }

    /**
     * Типы материалов с категориями
     * @return \app\models\node\Type[]|array
     */
    public function actionNodeTypes(){
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $types = Type::find()
            ->where(['not in', 'code', ['page', 'on-policy']])
            ->asArray()
            ->all();

        $types = array_map(function($item){
//            if($item['code'] == 'article') $item['name'] = 'Истории';
            if($item['code'] == 'article') $item['name'] = 'Специальные предложения';
            elseif($item['code'] == 'policy') $item['name'] = 'Продукты';

            //get categories
            $item['categories'] = Category::find()
                ->select([Category::tableName().'.id', Category::tableName().'.name', 'code'])
                ->joinWith('nodes', false)
                ->where(['type_id' => $item['id']])
                ->asArray()
                ->all();

            return $item;
        }, $types);

        return $types;
    }

    /**
     * Все активные авторы
     * @param array $filter
     * @return ActiveDataProvider
     */
    public function actionAuthors(array $filter = null){
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search($filter);

        return $dataProvider;
    }

    /**
     * Главные категории авторов
     * @return ActiveDataProvider
     */
    public function actionAuthorCategories(){
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $author_cats = Profile::find()
            ->select('category_id')
            ->active()
            ->ambassadors();

        return new ActiveDataProvider([
            'query' => Category::find()
                ->where(['id' => $author_cats]),
            'pagination' => false
        ]);
    }

    public function actionSearch($q = ''){
        \Yii::$app->response->format = Response::FORMAT_JSON;

        if(!$q)
            throw new BadRequestHttpException('Query not founded.');

        $query = (new \yii\elasticsearch\Query())
            ->from(ElasticNode::index(), ElasticNode::type())
            ->query(['multi_match' => [
                'query' => $q,
                'fields' => ['title', 'preview_text', 'detail_text'],
            ]])
            ->highlight(['fields' => [
                'title' => new \stdClass(),
                'preview_text' => new \stdClass(),
                'detail_text' => new \stdClass(),
            ]]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        return $provider->getModels();
    }
}