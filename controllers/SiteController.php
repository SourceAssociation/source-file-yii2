<?php
namespace file\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use file\models\File;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true
                    ]
                ]
            ],
            'verb' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get']
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $files = File::find()->andWhere(['enable' => 1])->orderBy('id DESC')->all();

        return $this->render('index', [
            'files' => $files
        ]);
    }
}