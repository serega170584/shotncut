<?php

namespace app\controllers;

use app\models\node\About;
use app\models\node\Career;
use app\models\node\Team;
use Yii;
use app\models\node\Node;


class AboutController extends \app\components\Controller
{
    public function actionContacts()
    {
        $comp_cr = Yii::$app->request->get('company', 0);

        /** @var \app\models\node\Type $type */
        $type = About::getNodeType();

        $models = About::find()->byType($type->id)->byAlias('about_contact')->all();
        $company = Node::getCompany();

        return $this->render('contacts', compact('models', 'company', 'comp_cr'));
    }

    public function actionCareers()
    {

        $comp_cr = Yii::$app->request->get('company', 0);

        /** @var \app\models\node\Type $type */
        $type = Career::getNodeType();

        $models     = Career::find()->byType($type->id)->byAlias('about_career')->orderBy(['sort' => SORT_ASC])->all();
        $intro      = Career::find()->byType($type->id)->byAlias('about_career_intro')->all();

        $company = Node::getCompany();

        return $this->render('career', compact('models', 'intro', 'company', 'comp_cr'));

    }

    public function actionTeam()
    {
        $comp_cr = Yii::$app->request->get('company', 0);

        /** @var \app\models\node\Type $type */
        $type = Team::getNodeType();

        $models = Team::find()->byType($type->id)->all();

        $company = Node::getCompany();

        return $this->render('team', compact('models', 'company', 'comp_cr'));

    }



}