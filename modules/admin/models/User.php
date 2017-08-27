<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 07.06.16
 * Time: 16:59
 */

namespace app\modules\admin\models;

use app\models\node\Node;
use app\models\node\Type;
use dektrium\user\models\User as BaseUser;

class User extends BaseUser {

    const ROLE_ADMIN = 'admin';
    const ROLE_MODERATOR = 'moderator';
    const ROLE_CONTENT_MANAGER = 'content-manager';
    const ROLE_AMBASSADOR = 'ambassador';

    /**
     * @return UserQuery
     */
    public static function find(){
        return new UserQuery(get_called_class());
    }
} 