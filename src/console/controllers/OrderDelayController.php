<?php

namespace console\controllers;

use console\jobs\OrderDelayJob;
use yii\console\Controller;

final class OrderDelayController extends Controller
{
    public function actionStart(): void
    {
        $jobs = new OrderDelayJob();
        $jobs->exec();
    }
}
