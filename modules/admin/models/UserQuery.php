<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 29.06.16
 * Time: 0:17
 */

namespace app\modules\admin\models;


use yii\db\ActiveQuery;

class UserQuery extends ActiveQuery {

    public function notBlocked(){
        return $this->where(['blocked_at' => null]);
    }

    public function confirmed(){
        return $this->where(['not', ['confirmed_at' => null]]);
    }

    /**
     * @inheritdoc
     * @return User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
} 