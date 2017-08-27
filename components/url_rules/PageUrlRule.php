<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 01.06.16
 * Time: 16:42
 */

namespace app\components\url_rules;


use app\models\node\Page;
use yii\base\InvalidConfigException;
use yii\base\Object;
use yii\web\Request;
use yii\web\UrlManager;
use yii\web\UrlRuleInterface;

class PageUrlRule extends Object implements UrlRuleInterface {

    /**
     * Parses the given request and returns the corresponding route and parameters.
     * @param UrlManager $manager the URL manager
     * @param Request $request the request component
     * @return array|boolean the parsing result. The route and the parameters are returned as an array.
     * If false, it means this rule cannot be used to parse this path info.
     */
    public function parseRequest($manager, $request)
    {

        if($request->url && preg_match_all('/\/[a-zA-Z0-9_-]+/', $request->url, $matches)){

            if($matches && !empty($matches[0])){
                $aliases = [];

                foreach ($matches[0] as $match) {
                    $aliases[] = str_replace('/', '', trim($match));
                }

                $pages = Page::find()->where(['alias' => $aliases])->all();
                $pageCount = count($pages);

                if($pageCount !== count($aliases))
                    return false;

                $validChain = true;

                for($i = 0; $i < $pageCount - 1; $i++){
                    $validChain = $validChain && $pages[$i + 1]->parent->id === $pages[$i]->id;
                }

                if(!$validChain)
                    return false;

                return ['site/page', [ 'id' => end($pages)->id ]];
            }
        }

        return false;
    }

    /**
     * Creates a URL according to the given route and parameters.
     * @param UrlManager $manager the URL manager
     * @param string $route the route. It should not have slashes at the beginning or the end.
     * @param array $params the parameters
     * @return string|boolean the created URL, or false if this rule cannot be used for creating this URL.
     */
    public function createUrl($manager, $route, $params)
    {

        if($route == 'site/page' && !empty($params['id'])){

            $id = intval($params['id']);

            $page = Page::findOne($id);

            if(!$page)
                return false;

            $aliases = [];
            $aliases[] = $page->alias;

            if(!$page->isRoot()){

                $parents = array_reverse($page->parents);

                foreach($parents as $p){
                    $aliases[] = $p->alias;
                }
            }

            return implode('/', array_reverse($aliases));

        }

        return false;
    }
}