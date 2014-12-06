<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                'gii' => 'gii',
                'add' => 'description/add',
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rest','pluralize'=>false ],
                'print/<hash:\w+>' => 'print/index',
                '<cmd:\w+>/<action:\w+>'=>'<cmd>/<action>',
                '<cmd:\w+>/<action:\w+>/<state:\w+>'=>'<cmd>/<action>/<state>',
                '<cmd:\w+>/<action:\w+>/<state:\w+>/<sid:\w+>'=>'<cmd>/<action>/<state>/<sid>',

            ]
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
