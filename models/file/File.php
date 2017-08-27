<?php

namespace app\models\file;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%sbl_file}}".
 *
 * @property integer $id
 * @property string $path
 * @property string $name
 * @property string $type
 * @property integer $size
 */
class File extends \yii\db\ActiveRecord
{
    /**
	 * @var mixed
	 */
	public $loaded_file = null;


    /**
	 * Возвращает ссылку на файл
	 * @return string
	 */
	public function getUrl()
	{
		$webroot = Yii::getAlias('@webroot');
		$path = $this->getFsPath();
		if (strpos($path, $webroot) === 0) {
			return str_replace($webroot, '', $path);
		}
		return null;
	}

	/**
	 * Возвращает путь к картике на диске
	 * @return string
	 */
	public function getFsPath()
	{
		return rtrim($this->fs->path, '/') . '/' . trim($this->path, '/');
	}

    public function getEntity(){
        return $this->hasOne(FileToEntity::className(), ['file_id' => 'id']);
    }

    /**
	 * Загружаем файл в файловую систему
     * @param mixed $file
     * @return bool
	 */
	public function loadFile($file)
	{
        $return = false;
        if ($file instanceof UploadedFile && file_exists($file->tempName)) {
            $this->deleteFile();
            $name = md5($file->tempName . time() . mt_rand(1, 1000));
            $this->path = '/' . substr($name, 0, 2) . '/' . $name . '.' . $file->extension;
            $this->name = $file->name;
            $this->type = $file->type;
            $this->size = $file->size;
            $stream = fopen($file->tempName, 'r+');
            $this->fs->writeStream($this->path, $stream);
            $return = true;
        } elseif (file_exists($file)) {
            $this->deleteFile();
            $arFile = pathinfo($file);
            $name = md5($file . time() . mt_rand(1, 1000));
            $this->path = '/' . substr($name, 0, 2) . '/' . $name . '.' . $arFile['extension'];
            $this->name = $arFile['basename'];
            $this->type = FileHelper::getMimeTypeByExtension($file);
            $this->size = filesize($file);
            $stream = fopen($file, 'r+');
            $this->fs->writeStream($this->path, $stream);
            $return = true;
        }
        return $return;
	}

    /**
     * Удаляет файл из файловой системы
     */
    public function deleteFile()
    {
        if ($this->path && $this->fs->has($this->path)) {
			$this->fs->delete($this->path);
			$basepath = dirname($this->path);
			$contents = $this->fs->listContents($basepath);
			if (empty($contents)) $this->fs->deleteDir($basepath);
        }
        $this->path = null;
    }



    /**
	 * @inheritdoc
	 */
	public function beforeSave($insert)
	{
		if ($return = parent::beforeSave($insert)) {
			if ($this->loaded_file !== null) $this->loadFile($this->loaded_file);
		}
        return $return;
	}

    /**
     * @inheritdoc
     */
    public function beforeDelete()
    {
        if ($return = parent::beforeDelete()) {
            //удаляем сам файл из файловой системы
            $this->deleteFile();
        }
        return $return;
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['loaded_file', 'safe'],
            ['path', 'validatePath'],
        ];
    }

    /**
	 * Должен быть указан файл
	 */
	public function validatePath($attribute, $params)
	{
        if (
            $this->loaded_file !== null
            && !($this->loaded_file instanceof UploadedFile)
            && !file_exists($this->loaded_file)
        ){
            $this->addError('loaded_file', 'Неверно задан файл');
        }

        $value = $this->$attribute;
        if ($this->loaded_file === null && !$this->fs->has($value)) {
            $this->addError($attribute, 'Файл не задан');
        }
	}



    /**
	 * Возвращает файловую систему
	 */
	public function getFs()
	{
		return Yii::$app->fs;
	}



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Путь относительно файловой системы сайта',
            'name' => 'Оригинальное название файла',
            'type' => 'Mime тип файла',
            'size' => 'Размер файла',
        ];
    }

    /**
     * @inheritdoc
     * @return FileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FileQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sbl_file}}';
    }
}
