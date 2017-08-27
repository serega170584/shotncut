<?php

namespace app\models\node;

use app\models\tag\Tag;
use app\modules\admin\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%sbl_node}}".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $sort
 * @property integer $status
 * @property string $title
 * @property string $alias
 * @property string $preview_text
 * @property string $detail_text
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property integer $tree
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $lang_id
 */
class ArticleSearch extends Article
{
    const SCENARIO_SEARCH = 'search';

    public $scenario = self::SCENARIO_SEARCH;

    public $tag_list;
    public $sort_type;
    public $order_attr;

    public function rules(){
        return [
            ['user_id', 'integer'],
            ['order_attr', 'in', 'range' => ['created_at', 'rating']],
            [
                'tag_list',
                'exist',
                'targetClass' => '\app\models\tag\Tag',
                'targetAttribute' => 'id',
                'allowArray' => true
            ],
        ];
    }

    public function scenarios(){
        $scenarios = parent::scenarios();

        $scenarios[static::SCENARIO_SEARCH] = ['!user_id', 'tag_list'];

        return $scenarios;
    }

    public function search($params = [], $pageSize = 6){

        $query = Article::find();

        $query
            ->active()
            ->with('category')
            ->orderByDateCreated();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize
            ]
        ]);

        if( !($this->load($params) && $this->validate()) ){
            return $dataProvider;
        }

        if($this->user_id)
            $query->byUser($this->user_id);

        if($this->tag_list){
            $tag_list = $this->tag_list;
            $query->byTags($tag_list, 'tags');
        }

        if($this->sort_type){
            switch($this->sort_type){
                case static::SORT_BY_CREATED_AT:
                    $query->orderByDateCreated();
                    break;
                case static::SORT_BY_RATING:
                    $query->orderByRaiting();
                    break;
            }
        }

        if($this->order_attr){
            $query->orderBy([
                $this->order_attr => SORT_DESC
            ]);
        }

        return $dataProvider;
    }

    public function formName(){
        return '';
    }

    public static function sortTypes(){
        return [
            static::SORT_BY_CREATED_AT => 'По дате',
            static::SORT_BY_RATING => 'По рейтингу'
        ];
    }
}
