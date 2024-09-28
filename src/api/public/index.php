<?php

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../config/aliases.php';

use yii\web\Application;
use Dotenv\Dotenv;

(Dotenv::createUnsafeImmutable(
    dirname(dirname(dirname(__DIR__))),
    ['.env'],
    false
))->load();

$config = require __DIR__ . '/../config/main.php';

(new Application($config))->run();
