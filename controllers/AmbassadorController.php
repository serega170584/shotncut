<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 07.06.16
 * Time: 16:39
 */

namespace app\controllers;


use app\components\Controller;
use app\models\node\Article;
use app\models\node\ArticleSearch;
use app\modules\admin\models\User;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class AmbassadorController extends Controller{

    public function actionIndex($id = null){

        if(!$id){
            return $this->render('index');
        }

        $ambassador = $this->checkAmbassador($id);

        return $this->render('ambassador', compact('ambassador'));
    }

    public function actionArticle($id){

        $article = Article::find()
            ->where([Article::tableName().'.id' => $id])
            ->active()
            ->withAuthor()
            ->one();

        if(!$article)
            throw new NotFoundHttpException();

        $this->checkAmbassador($article->user_id);

        $this->registerSeo($article);

        return $this->render('view', compact('article'));
    }

    private function checkAmbassador($id){

        /** @var User $user */
        $user = User::findOne($id);

        if(!$user)
            throw new NotFoundHttpException();

        if($user->isBlocked)
            throw new NotFoundHttpException();

        if(!\Yii::$app->authManager->checkAccess($user->id, User::ROLE_AMBASSADOR))
            throw new NotFoundHttpException();

        return $user;
    }
} 