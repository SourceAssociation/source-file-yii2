<?php
namespace file\modules\ajax\controllers;

use Yii;
use yii\base\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\BaseJson;

/**
* SiteController
*/
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get']
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $result['error'] = 110;
        $result['msg'] = "Hi,Boy,This request is error";

        return BaseJson::encode($result);
    }
}
