<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 06.07.16
 * Time: 9:43
 */

namespace app\commands;


use app\models\elasticsearch\node\ElasticNode;
use app\models\node\Article;
use app\models\node\Policy;
use yii\console\Controller;
use yii\helpers\Console;
use yii\helpers\Json;

class SearchController extends Controller {

    /**
     * Setup elastic search
     */
    public function actionSetup(){
        ElasticNode::deleteIndex();
        ElasticNode::createIndex();

        //polices
        $polices = Policy::find()
            ->active()
            ->all();

        $this->stdout(ElasticNode::index().' - '.ElasticNode::type()." - policy\n", Console::FG_GREEN);

        foreach($polices as $item){
            $this->stdout($item->id.' - '.$item->title."\n", Console::FG_YELLOW);

            $elasticNode = new ElasticNode();

            $elasticNode->primaryKey = $item->id;
            $elasticNode->title = $item->title;
            $elasticNode->preview_text = preg_replace('/\s\s+/', ' ', strip_tags($item->preview_text));
            $elasticNode->detail_text = '';

            $item->changeConstructor();
            $parts_text = [];
            foreach($item->getParts() as $part){
                $str = $part->toString();

                if($str)
                    $parts_text[] = $part->toString();
            }
            $elasticNode->detail_text = preg_replace('/\s\s+/', ' ', strip_tags(implode('; ', $parts_text)));

            $elasticNode->url = $item->url;

            $elasticNode->save();
        }

        //articles
        $polices = Article::find()
            ->active()
            ->all();

        $this->stdout(ElasticNode::index().' - '.ElasticNode::type()." - article\n", Console::FG_GREEN);

        foreach($polices as $item){
            $this->stdout($item->id.' - '.$item->title."\n", Console::FG_YELLOW);

            $elasticNode = new ElasticNode();

            $elasticNode->primaryKey = $item->id;
            $elasticNode->title = $item->title;
            $elasticNode->preview_text = $item->preview_text;
            $elasticNode->detail_text = '';

            $parts_text = [];
            foreach($item->getParts() as $part){
                $str = $part->toString();

                if($str)
                    $parts_text[] = $part->toString();
            }
            $elasticNode->detail_text = implode('; ', $parts_text);
            $elasticNode->url = $item->url;

            $elasticNode->save();
        }
    }
} 