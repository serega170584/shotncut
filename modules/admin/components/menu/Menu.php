<?php

namespace app\modules\admin\components\menu;

use app\modules\admin\models\User;
use Yii;
use yii\base\Component;
use app\modules\admin\components\CrudController;

class Menu extends Component
{
    /**
     * @var array
     */
    protected $_menus = null;

    /**
     * @return array
     */
    public function getMenus()
    {
        if ($this->_menus === null) {
            $this->_menus = [
                'top_menu' => $this->getTopMenu(),
                'left_menu' => $this->getLeftMenu(),
                'user_menu' => $this->getUserMenu(),
                'profile_menu' => $this->getProfileMenu(),
            ];
        }
        return $this->_menus;
    }


    /**
     * @return array
     */
    protected function getTopMenu()
    {
        $can_admin = Yii::$app->user->can(User::ROLE_ADMIN);

        return [
            [
                'label' => 'Контент', 'url' => '',
                'items' => [
                    ['label' => 'Верхнее меню', 'url' => ['/admin/categories-menu'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
                    ['label' => 'Мои статьи', 'url' => ['/admin/ambassador-articles'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_AMBASSADOR)],
                    ['label' => 'Новости', 'url' => ['/admin/news'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
                    ['label' => 'Категории видео', 'url' => ['/admin/categories-video'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
                    ['label' => 'Видео', 'url' => ['/admin/video'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
                    ['label' => 'Статьи', 'url' => ['/admin/articles'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
                    ['label' => 'Страницы', 'url' => ['/admin/pages'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
/*
                    ['label' => 'О компании', 'url' => '',
                    'items' => [
//                            ['label' => 'О нас', 'url' => ['/admin/about/update?id=64'],
//                                'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
                            ['label' => 'Команда', 'url' => ['/admin/team'],
                                'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
                            ['label' => 'Контакты', 'url' => ['/admin/about/update?id=62'],
                                'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
                        ]
                    ],*/

                    ['label' => 'О Компании', 'url' => ['/admin/about-list'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],

                    ['label' => 'Обратная связь', 'url' => ['/admin/feedback'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
/*
                    ['label' => 'О Компании / Контакты', 'url' => ['/admin/about'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
                    ['label' => 'О Компании / Реестр', 'url' => ['/admin/registry'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
                    ['label' => 'О Компании / Команда', 'url' => ['/admin/team'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],
                    */
                ],
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => 'Продукты', 'url' => '',
                'items' => [
                    ['label' => 'Способ оформления', 'url' => ['/admin/categories2'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],

                    ['label' => 'Разделы витрины', 'url' => ['/admin/categories'],
                        'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)],

                    ['label' => 'Список продуктов', 'url' => ['/admin/products']],
                ],
                'visible' => $can_admin || Yii::$app->user->can(User::ROLE_CONTENT_MANAGER)
            ]
        ];
    }

    /**
     * @return array
     */
    protected function getLeftMenu()
    {
        $controller = Yii::$app->controller;
        if (!($controller instanceof CrudController)) return null;
        //компонуем левое меню
        $baseRoute = ($controller->module ? "/{$controller->module->id}" : '') . "/{$controller->id}/";
		$return = [
			['label' => 'Список', 'url' => ["{$baseRoute}index"]],
			['label' => 'Добавить', 'url' => ["{$baseRoute}create"]],
		];
        //если указана конкретная модель, то можем удалить ее
        $id = Yii::$app->request->get('id');
        if ($id) {
            $return[] = [
				'label' => 'Удалить',
				'url' => ["{$baseRoute}delete", 'id' => $id],
			];
        }
        return $return;
    }

    /**
     * @return array
     */
    protected function getProfileMenu()
    {
        return [
            [
                'label' => !Yii::$app->user->isGuest ? Yii::$app->user->identity->username : '', 'url' => '',
                'items' => [
                    ['label' => 'Профиль', 'url' => ['/user/settings/profile']],
                    ['label' => 'Выйти', 'url' => ['/user/logout'], 'encode' => false, 'linkOptions' => ['data-method' => 'post', 'data-confirm' => 'Вы уверены?']],
                ],
                'visible' => !Yii::$app->user->isGuest
            ]
        ];
    }

    /**
     * @return array
     */
    protected function getUserMenu()
    {
        return [
            [
                'label' => 'Пользователи', 'url' => '',
                'items' => [
                    ['label' => 'Управление пользователями', 'url' => ['/user/admin']],
                    ['label' => 'Управление доступом', 'url' => ['/rbac']],
                ],
                'visible' => !Yii::$app->user->isGuest ? Yii::$app->user->identity->isAdmin : false
            ]
        ];
    }
}
