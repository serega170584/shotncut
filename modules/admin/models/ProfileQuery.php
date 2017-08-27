<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 29.06.16
 * Time: 0:17
 */

namespace app\modules\admin\models;


use yii\db\ActiveQuery;

class ProfileQuery extends ActiveQuery {

    public function active(){

        return $this->joinWith(['user' => function(UserQuery $q){
            //$q->notBlocked()->confirmed();
        }], false);
    }

    public function ambassadors(){
        return $this->where(['user_id' => \Yii::$app->authManager->getUserIdsByRole(User::ROLE_AMBASSADOR)]);
    }

    /**
     * @inheritdoc
     * @return Profile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Profile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
} 