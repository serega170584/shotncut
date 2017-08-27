<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 09.06.16
 * Time: 13:58
 */

namespace app\modules\admin\models;

use app\models\category\Category;
use app\models\node\Node;
use dektrium\user\models\Profile as BaseProfile;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $name
 * @property string  $public_email
 * @property string  $gravatar_email
 * @property string  $gravatar_id
 * @property string  $location
 * @property string  $website
 * @property string  $bio
 * @property User    $user
 *
 * @property string  $status
 * @property string  $birth_date
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */
class ProfileSearch extends Profile {

    public function rules()
    {
        return [
            [['category_id'], 'integer']
        ];
    }

    public function search($params = []){

        $query = Profile::find()
            ->active()
            ->ambassadors();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'key' => 'user_id'
        ]);

        if( !($this->load($params) && $this->validate()) ){
            return $dataProvider;
        }

        if($this->category_id){
            $query->where(['category_id' => $this->category_id]);
        }

        return $dataProvider;

    }

    public function formName(){
        return '';
    }
} 