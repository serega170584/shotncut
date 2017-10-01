<?php

namespace app\controllers;

use app\models\node\Article;
use app\models\node\News;
use app\models\node\NodeQuery;
use app\models\node\Policy;
use app\models\node\PolicyType;
use app\models\node\Team;
use app\models\node\Career;
use app\models\node\Video;
use app\models\node\Registry;
use app\models\node\AboutFirst;
use app\models\node\AboutSlider;
use app\models\node\AboutHistory;
use app\models\node\About;
use app\models\node\Node;
use app\models\node\Page;
use app\models\node\Type;
use app\models\category\Category;
use app\models\category\Category2;
use app\models\category\CategoryVideo;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\DatePicker;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\NotFoundHttpException;


class SiteController extends \app\components\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $nodes = $this->getProductList();

        $data = [
            'strah_category' => Category::find()->sorted()->all(),
            'video_category' => CategoryVideo::find()->all(),
            'nodes' => $nodes
        ];

        return $this->render('index', $data);
    }

    public function actionListmore($page)
    {
        return $this->renderPartial('productList', [
            'nodes' => $this->getProductList()
        ]);
    }

    /**
     * @param int $page
     * @return array|Node[]
     */
    private function getProductList($page=0)
    {
        $products = Policy::find()->defaultSort()->limit(4)->offset($page*4)->all();
        $news = News::find()->defaultSort()->limit(4)->offset($page*4)->all();
        $videos = Video::find()->defaultSort()->limit(4)->offset($page*4)->all();

        $maxCount = max(count($products), count($news), count($videos));
        $result = [];
        for($i=0;$i<$maxCount;$i++) {
            if (isset($products[$i])) {
                $result[] = $products[$i];
            }
            if (isset($news[$i])) {
                $result[] = $news[$i];
            }
            if (isset($videos[$i])) {
                $result[] = $videos[$i];
            }
        }

        return $result;
    }

    public function actionNode($type){

        $type = Type::find()->byCode($type)->one();

        $models = Node::find()->byType($type->id)->all();

        return $this->render('node', compact('type', 'models'));

    }

    public function actionView($alias)
    {
        $model = Node::findOne(['alias' => $alias]);

        return $this->render('view', compact('model'));
    }

/*
    public function actionView($id)
    {
        $model = Node::findOne(['id' => $id]);

        return $this->render('view', compact('model'));
    }
*/

    public function actionPage($id)
    {
        $page = Page::findOne($id);

        if(!$page)
            throw new NotFoundHttpException();

        return $this->render('view', compact('page'));
    }

    public function actionActivate(){

        return $this->render('activate');
    }


    public function actionPartners(){

        $type = Page::getNodeType();

        $model = Page::find()->byType($type->id)->byAlias('partner')->one();

        return $this->render('partner', compact('model'));

    }


    public function actionAboutTeam(){

        $comp_cr = Yii::$app->request->get('company', 0);

        $type = Team::getNodeType();

        $models = Team::find()->byType($type->id)->byCompany($comp_cr)->all();

        return $this->render('about/team', compact('models'));

    }



    
    public function actionAboutCareer(){

        $comp_cr = Yii::$app->request->get('company', 0);

        $type = Career::getNodeType();

        $data['models']     = Career::find()->byType($type->id)->byCompany($comp_cr)->byAlias('about_career')->orderBy(['sort' => SORT_ASC])->all();
        $data['intro']      = Career::find()->byType($type->id)->byCompany($comp_cr)->byAlias('about_career_intro')->one();

        return $this->render('about/career', compact('data'));

    }

/*
    public function actionVideo(){

        $type = Video::getNodeType();

        $models = Video::find()->byType($type->id)->all();

        return $this->render('video', compact('models'));

    }*/





    public function actionAboutContact(){

        $comp_cr = Yii::$app->request->get('company', 0);

        $type = About::getNodeType();
        $model = About::find()->byType($type->id)->byAlias('about_contact')->byCompany($comp_cr)->one();

        return $this->render('about/index', compact('model'));

    }


    public function actionAbout(){

        $comp_cr = Yii::$app->request->get('company', 0);

        $type   = AboutFirst::getNodeType();


        $data = [];

        $data['text'] = AboutFirst::find()
            ->byType($type->id)
            ->byAlias('about_first')
            ->byCompany($comp_cr)
            ->one();


        $type   = AboutSlider::getNodeType();

        $data['slider'] = AboutSlider::find()
            ->byType($type->id)
            ->byAlias('about_slider')
            ->byCompany($comp_cr)
            ->orderBy(['sort' => SORT_ASC])
            ->all();


        $type   = AboutHistory::getNodeType();

        $data['history'] = AboutHistory::find()
            ->byType($type->id)
            ->byAlias('about_history')
            ->byCompany($comp_cr)
            ->orderBy(['sort' => SORT_ASC])
            ->all();

        return $this->render('about/first', compact('data'));
    }


    public function actionAboutDisclosure()
    {
        $comp_cr = Yii::$app->request->get('company', 0);
        $type   = AboutFirst::getNodeType();

        $data = AboutFirst::find()
            ->byType($type->id)
            ->byAlias('about_disclosure')
            ->byCompany($comp_cr)
            ->one();

        return $this->render('about/disclosure', compact('data'));
    }


    public function actionAboutRegistry(){

        /*
        $comp_cr = Yii::$app->request->get('company', 0);

        $type = Registry::getNodeType();

        $models = Registry::find()->byType($type->id)->byCompany($comp_cr)->orderBy(['sort' => SORT_ASC])->all();

        return $this->render('about/registry', compact('models'));

        */

        $comp_cr = Yii::$app->request->get('company', 0);
        $type   = AboutFirst::getNodeType();

        $data = AboutFirst::find()
            ->byType($type->id)
            ->byAlias('about_reestr')
            ->byCompany($comp_cr)
            ->one();

        return $this->render('about/reestr', compact('data'));
    }



}
