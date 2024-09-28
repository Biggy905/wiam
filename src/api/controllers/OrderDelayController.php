<?php

namespace api\controllers;

use api\forms\CreateOrderDelayForm;
use api\forms\CreateOrderForm;
use api\services\OrderDelayService;
use api\services\OrderService;
use common\components\AbstractController;
use common\enums\OrderIsApprovedStatusEnum;
use common\exceptions\FormException;
use Yii;

final class OrderDelayController extends AbstractController
{
    public function __construct(
        $id,
        $module,
        private readonly OrderDelayService $service,
        private readonly CreateOrderDelayForm $createOrderDelayForm,
        array $config = []
    ) {
        parent::__construct($id, $module, $config);
    }

    public function actionProcessor(): array
    {
        $payloadGet = Yii::$app->request->get();

        $form = $this->createOrderDelayForm;
        if ($form->runValidate($payloadGet)) {
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
