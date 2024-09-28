<?php

namespace console\controllers;

use yii\console\Controller;
use Yii;

final class TestController extends Controller
{
    public function actionIndex(): void
    {
        $password = Yii::$app->security->generatePasswordHash('123456789');

        echo $password;
    }
}
