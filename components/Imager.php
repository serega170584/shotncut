<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 01.06.16
 * Time: 10:34
 */

namespace app\components;


use Imagine\Image\Box;
use yii\base\Component;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use yii\imagine\Image;

/**
 * Component for generate thumbs
 *
 * @property string $cachePath
 */
class Imager extends Component {

    public $cachePath = '@webroot/thumbs';

    /**
     * Return thumbnail url
     * @param $origin_path_image
     * @param $width
     * @param $height
     * @param int $q
     * @param bool $rewrite
     * @return mixed|null
     */
    public function getThumbUrl($origin_path_image, $width = 0, $height = 0, $q = 80, $rewrite = false){

        return $this->getUrl($this->createThumb($origin_path_image, $width, $height, $q, $rewrite));
    }

    /**
     * Return img html tag with thumb url
     * @param $origin_path_image
     * @param $width
     * @param $height
     * @param int $q
     * @param bool $rewrite
     * @param array $options
     * @return string
     */
    public function getThumbImg($origin_path_image, $width = 0, $height = 0, $q = 80, $rewrite = false, $options = []){

        return Html::img($this->getUrl($this->createThumb($origin_path_image, $width, $height, $q, $rewrite)), $options);
    }

    /**
     * Create thumbnail and save it
     * @param $origin_path_image
     * @param $width
     * @param $height
     * @param int $q
     * @param bool $rewrite
     * @return null|string
     */
    private function createThumb($origin_path_image, $width = 0, $height = 0, $q = 80, $rewrite = false){

        $thumb_path  = $this->getThumbPath($origin_path_image, $width, $height);

        if(!$thumb_path)
            return null;

        try{
            if($rewrite || !file_exists($thumb_path)) {

                FileHelper::createDirectory(dirname($thumb_path));

                Image::thumbnail($origin_path_image, $width, $height)
                    ->save($thumb_path, ['quality' => $q]);
            }
        }catch (\Exception $e){
            return null;
        }

        return $thumb_path;
    }

    /**
     * Return path to thumbnails directory
     * @param $origin_path_image
     * @param $width
     * @param $height
     * @return null|string
     */
    private function getThumbPath($origin_path_image, $width, $height){
        $thumb_name = basename($origin_path_image);
        if(!$thumb_name)
            return null;

        $size_dir = '';

        if($width && $height) $size_dir = implode('x', [$width, $height]);
        elseif($width) $size_dir = $width.'';
        elseif($height) $size_dir = $height.'';
        elseif(!$width && !$height) return null;

        return $this->getCachePath().'/'.$size_dir.'/'.$thumb_name;
//      todo исправлено DIRECTORY_SEPARATOR
//      return $this->getCachePath().DIRECTORY_SEPARATOR.$size_dir.DIRECTORY_SEPARATOR.$thumb_name;
    }

    /**
     * Return path to thumbs directory
     * @return bool|string
     */
    private function getCachePath(){
        return \Yii::getAlias($this->cachePath);
    }

    /**
     * Return url to thumb
     * @param $thumb_path
     * @return mixed|null
     */
    private function getUrl($thumb_path){

        if(strpos($thumb_path, \Yii::getAlias('@webroot')) === 0)
            return str_replace(\Yii::getAlias('@webroot'), '', $thumb_path);

        return null;
    }
} 