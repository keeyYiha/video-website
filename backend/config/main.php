<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'],
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'video-website-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'login' => 'site/login',
            ],
        ],
        'authManager' => [
            'class' => \backend\components\rbac\DbManager::class,
            // 'defaultRoles' => ['admin', 'author'],
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],
        
    ],
    'as access' => [
        'class' => \backend\components\rbac\AccessControl::class,
        'rules' => [
            [ //未登录则跳转到登录界面
                'allow' => true,
                'actions' => ['login'],
                'roles' => ['?'],
            ],
            // [ //已登录用户
            //     'allow' => true,
            //     'roles' => ['@'],
            // ]
        ],
        // 'allowActions' => [
        //     '/site/logout'
        // ],
    ],
    'params' => $params,
];
