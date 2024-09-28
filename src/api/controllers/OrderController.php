<?php

namespace api\controllers;

use api\forms\CreateOrderForm;
use api\services\OrderService;
use common\components\AbstractController;
use Yii;

final class OrderController extends AbstractController
{
    public function __construct(
        $id,
        $module,
        private readonly OrderService $service,
        private readonly CreateOrderForm $createOrderForm,
        array $config = []
    ) {
        parent::__construct($id, $module, $config);
    }

    public function actionRequests(): array
    {
        $payloadPost = json_decode(Yii::$app->request->getRawBody(), true) ?? [];

        $form = $this->createOrderForm;
        if ($form->runValidate($payloadPost)) {
            $data = $this->response(
                $this->service->create($form)
            );
        } else {
            $data = $this->response(
                $form->getFirstErrors(),
                400
            );
        }

        return $data;
    }
}
