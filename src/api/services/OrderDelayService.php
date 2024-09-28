<?php

namespace api\services;

use api\forms\CreateOrderDelayForm;
use common\entities\OrderDelay;
use common\enums\OrderDelayWorkStatusEnum;
use common\repositories\OrderDelayRepository;
use DateTimeImmutable;

final class OrderDelayService
{
    public function __construct(
        private readonly OrderDelayRepository $orderDelayRepository
    ) {

    }

    public function create(CreateOrderDelayForm $form): array
    {
        $orderDelay = new OrderDelay();

        $orderDelay->value = $form->delay;
        $orderDelay->work = OrderDelayWorkStatusEnum::STATUS_START->value;
        $orderDelay->created_at = (new DateTimeImmutable())->format('Y-m-d H:i:s');

        $this->orderDelayRepository->save($orderDelay);

        return [
            'id' => $orderDelay->id,
            'result' => true,
            'message' => 'Задание запущено!'
        ];
    }
}
