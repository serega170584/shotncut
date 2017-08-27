<?php

namespace app\components;

use Yii;

class Controller extends \yii\web\Controller
{
    public $layout = 'v2';

    /**
     * Set SEO title and meta tags
     * @param iSeo $model
     */
    public function registerSeo(iSeo $model){

        if(!$model instanceof iSeo) return;

        //set title
        $this->view->title = $model->getSeoTitle();

        //set keywords and description
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $model->getSeoKeywords()
        ]);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $model->getSeoDescription()
        ]);
    }
}
