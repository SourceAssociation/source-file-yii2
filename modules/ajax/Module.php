<?php
namespace file\modules\ajax;

use yii;
use yii\base\Module as BaseModule;
use yii\helpers\BaseJson;

/**
* Ajax 模块
*/
class Module extends BaseModule
{
    public $controllerNamespace = 'file\modules\ajax\controllers';

    public function init()
    {
        parent::init();
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            // 只能是Ajax请求才能进入该模块
            if (Yii::$app->request->isAjax) {
                return true;
            } else {
                $result['error'] = 1;
                $result['msg'] = "请求方式错误";
                echo BaseJson::encode($result);
            }
        }
        return false;
    }
}