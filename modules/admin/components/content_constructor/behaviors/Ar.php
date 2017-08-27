<?php

namespace app\modules\admin\components\content_constructor\behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;
use yii\validators\Validator;
use app\modules\admin\components\content_constructor\Construction;
use app\models\file\File;
use yii\web\View;

class Ar extends Behavior
{
    /**
     * @var string
     */
    public $attribute = 'detail_text';

    public $constructor = null;


    /**
     * Отображает, сохраненный в json контент
     * @param View $view
     * @internal param Construction $construction
     * @internal param Construction $contruction
     * @return string
     */
    public function renderArticle(View $view)
    {
        $construction = new Construction([], $this->constructor ? new $this->constructor : null);
        $construction->addParts($this->getArticle());
        foreach ($construction->getParts() as $part) {
            $opt = $part->getValue();
            $opt['owner'] = $this->owner;
            $part->setValue($opt);
        }
        return $construction->renderPublic($view);
    }

    /**
     * All parts
     * @return mixed
     */
    public function getParts(){
        $construction = new Construction([], $this->constructor ? new $this->constructor : null);
        $construction->addParts($this->getArticle());
        foreach ($construction->getParts() as $part) {
            $opt = $part->getValue();
            $opt['owner'] = $this->owner;
            $part->setValue($opt);
        }
        return $construction->getParts();
    }

    /**
	 * Возвращает контент преобразованный из json в массив
	 * @return array
	 */
	public function getArticle()
	{
        $attr = $this->attribute;
		return $this->owner->$attr ? json_decode($this->owner->$attr, true) : [];
	}

	/**
	 * Задает контент преобразованный из json в массив
	 * @param array $article
	 */
	public function setArticle($article)
	{
        $attr = $this->attribute;
		$article = $article && is_array($article) ? $article : [];
		$set = [];
		foreach ($article as $a) {
			if (empty($a['type']) || empty($a['value'])) continue;
			$set[] = $a;
		}
		$this->owner->$attr = json_encode($set, JSON_FORCE_OBJECT);
	}


    /**
     * @inheritdoc
     */
    public function attach($owner)
    {
        parent::attach($owner);
        //валидатор для поля с файлом
        $fileValidator = Validator::createValidator(
            'safe',
            $this->owner,
            'article'
        );
        $owner->validators[] = $fileValidator;
    }



    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
        ];
    }

    public function beforeDelete($event)
    {
        $ar = $this->getArticle();
		foreach ($ar as $item) {
			if ($item['type'] === 'image') {
				$file = File::find()->byPath($item['value'])->one();
				if ($file) $file->delete();
			}
		}
    }
}
