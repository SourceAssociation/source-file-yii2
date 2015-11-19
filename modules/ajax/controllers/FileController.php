<?php
namespace file\modules\ajax\controllers;

use Yii;
use yii\base\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\BaseJson;
use file\models\File;

/**
* 文件
*/
class FileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['valid'],
                        'allow' => true
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'valid' => ['post']
                ]
            ]
        ];
    }


    public function actionValid()
    {
        $result['error'] = 1101;

        $id = Yii::$app->request->post('fid');
        $pwd = Yii::$app->request->post('pwd');

        if (!$id) {
            $result['msg'] = '参数错误！';
            return BaseJson::encode($result);
            Yii::$app->end();
        }
        $file = File::findOne(intval($id));
        if ($file) {
            if ($file->validatePassword($pwd)) {
                $result['error'] = 0;
                $result['msg'] = '验证成功！';
                $result['url'] = $file->url;
            }else{
                $result['msg'] = '密码输入错误！';
            }
        }else{
            $result['msg'] = '您要修改的记录不存在！';
        }
        return BaseJson::encode($result);
    }
}