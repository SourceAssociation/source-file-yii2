<?php
namespace file\models;

use Yii;
use common\models\File as CommonFile;

/**
* 文件
*/
class File extends CommonFile
{
    // 只能获取未被删除的文件  使用时通过 andWhere() 而不是 where()
    public static function find()
    {
        return parent::find()->where(['deleted' => 0]);
    }

    // 过滤掉一些字段，特别用于你想继承父类实现并不想用一些敏感字段
    public function fields()
    {
        $fields = parent::fields();
        // 去掉一些包含敏感信息的字段
        unset($fields['id'], $fields['uid'], $fields['name']);
        return $fields;
    }

    // 文件大小
    public function getFileSize()
    {
        $origin_size = $this->filesize;
        if ($origin_size == 0) {
            return Yii::$app->params['file_unknown']['file_size_unknown'];
        }
        if ($origin_size > 1024) {
            $filesize = floatval(round($origin_size/1024, 2));
        }
        if ($filesize > 1024) {
            $filesize = floatval(round($filesize/1024, 2));
            return $filesize." <small>MB</small>";
        }
        return $filesize." <small>KB</small>";
    }

    // 文件类型
    public function getFileType()
    {
        if ($this->filetype == '0') {
            return Yii::$app->params['file_unknown']['file_type_unknown'];
        }else{
            return $this->filetype;
        }
    }

    // 文件链接类型
    public function getUrlType()
    {
        if ($this->urltype == 0) {
            return Yii::$app->params['file_unknown']['url_type_unknown'];
        }else{
            return Yii::$app->params['file_url_type'][$this->urltype];
        }
    }
}