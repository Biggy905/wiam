<?php

namespace api\services;

use api\forms\CreateOrderForm;
use common\entities\Order;
use common\enums\OrderIsApprovedStatusEnum;
use common\repositories\OrderRepository;
use DateTimeImmutable;

final class OrderService
{
    public function __construct(
        private readonly OrderRepository $orderRepository
    ) {

    }
    public function create(CreateOrderForm $form): array
    {
        $order = new Order();

        $order->user_id = $form->user_id;
        $order->amount = $form->amount;
        $order->term = $form->term;
        $order->is_approved = OrderIsApprovedStatusEnum::STATUS_NEW->value;
        $order->created_at = (new DateTimeImmutable())->format('Y-m-d H:i:s');

        $this->orderRepository->save($order);

        return [
            'id' => $order->id,
            'result' => true,
            'message' => 'Создана заявка!'
        ];
    }
}
