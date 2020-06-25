<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 
                            'skipOnEmpty' => true, 
                            'extensions' => 'xml,pdf,xls,xlsx,doc,docx,msg,jpeg,jpg,png,csv,eml,ogg,pfx,ret,dwg,mp4,rar,zip,txt',
                            'maxSize'=>1024 * 1024 * 5],
        ];
    }
    
    public function upload($diretorio)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs($diretorio . '/' . strtolower(str_replace(' ','',$this->imageFile->baseName)) . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}