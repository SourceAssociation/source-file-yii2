<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

$db = require(__DIR__ . '/../../common/config/db.php');

$config = [
    'id' => 'Source Science&Technology Association',
    'basePath' => dirname(__DIR__),
    'language' => 'zh_cn',
    'defaultRoute' => 'site',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'file\controllers',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'NEnQbZ6G3i2YWX8TsyFCCzOc-xMNhiTV',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'idParam' => '__file',   // 这个是设置session的前缀
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        // 数据库配置
        'db' => $db,
        //授权管理
        'authManager' => [
            'class' => 'yii\rbac\DbManager',   // PhpManager 和 DbManager
            'ruleTable' => 'ss_auth_rule',
            'itemTable' => 'ss_auth_item',
            'itemChildTable' => 'ss_auth_item_child',
            'assignmentTable' => 'ss_auth_assignment',
        ],
        // 访问路径管理
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'=>false,
            'rules'=>[
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        // 错误处理
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'modules' => [],
    'params' => $params,
];


if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
