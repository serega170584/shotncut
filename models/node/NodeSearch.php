<?php

namespace app\models\node;

use app\components\iSeo;
use dektrium\user\models\User;
use paulzi\nestedsets\NestedSetsBehavior;
use yii\behaviors\TimestampBehavior;
use app\models\lang\Lang;
use app\models\file\File;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\Query;

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
 * @property integer $rating
 *
 * @property integer $parent_id
 */
class NodeSearch extends Node
{

    public function rules(){
        return [
            [['type_id', 'category_id'], 'integer']
        ];
    }

    public function search($params = []){

        $query = static::find()
            ->with('type')
            ->active();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);

        if( !($this->load($params) && $this->validate()) ){
            return $dataProvider;
        }

        if($this->type_id){
            $query->byType($this->type_id);
        }

        if($this->category_id){
            $query->byCategory($this->category_id);
        }

        return $dataProvider;
    }

    public function formName(){
        return '';
    }
}
