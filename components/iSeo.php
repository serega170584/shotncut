<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 12.06.16
 * Time: 20:10
 */

namespace app\components;


interface iSeo {

    /**
     * Return SEO title
     * @return string
     */
    public function getSeoTitle();

    /**
     * Return keywords for meta tag
     * @return string
     */
    public function getSeoKeywords();

    /**
     * Return description for meta tag
     * @return string
     */
    public function getSeoDescription();
}