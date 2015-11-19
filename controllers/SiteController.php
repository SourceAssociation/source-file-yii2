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
    // YII2的防止csrf攻击，不能多次提交相同的表单
    public $enableCsrfValidation = false;

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'error'],
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

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
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