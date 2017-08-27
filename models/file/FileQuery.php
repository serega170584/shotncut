<?php

namespace app\models\file;

use Yii;

/**
 * This is the ActiveQuery class for [[File]].
 *
 * @see File
 */
class FileQuery extends \yii\db\ActiveQuery
{
    /**
     * Поиск по названию файла
     * @param string $val
     * @return \app\models\file\FileQuery
     */
    public function byFileName($val)
    {
        $path = '/' . substr($val, 0, 2) . '/' . $val;
        return $this->andWhere(['or', ['path' => $path], ['name' => $val]]);
    }

    /**
     * Поиск по пути до файла
     * @param string $val
     * @return \app\models\file\FileQuery
     */
    public function byPath($val)
    {
        $webroot = Yii::getAlias('@webroot');
        $fsPath = str_replace($webroot, '', Yii::$app->fs->path);
        if (strpos($val, $fsPath) === 0) $val = str_replace($fsPath, '', $val);
        $val = '/' . trim($val, '/');
        return $this->andWhere(['path' => $val]);
    }


    /**
     * @inheritdoc
     * @return File[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return File|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
