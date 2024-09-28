<?php

namespace api\controllers;

use common\components\AbstractController;

final class DefaultController extends AbstractController
{
    public function actionIndex(): array
    {
        return $this->response(['Добро пожаловать!']);
    }
}
