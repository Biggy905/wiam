<?php

return [
    'id' => 'rest_api',
    'name' => 'REST API',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => \yii\web\JsonParser::class,
            ],
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
        ],
        'errorHandler' => [
            'class' => \common\components\ErrorHandler::class,
        ],
        'cache' => [
            'class' => yii\caching\FileCache::class,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require '../../common/config/db.php',
        'urlManager' => [
            'class' => \yii\web\UrlManager::class,
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => require 'routes.php',
        ],
    ],
    'container' => [
        'singletons' => require 'container.php',
        'definitions' => [],
    ],
];
