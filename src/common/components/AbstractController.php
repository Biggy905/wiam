<?php

namespace common\components;

use yii\base\Controller;
use yii\web\Response;

abstract class AbstractController extends Controller
{
    public function response(array $data, int $status = 200): array
    {
        $this->response->format = Response::FORMAT_JSON;

        return [
            'code' => $status,
            'data' => $data,
        ];
    }
}
