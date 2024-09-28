<?php

namespace common\repositories;

use common\entities\Order;
use common\repositories\interfaces\OrderRepositoryInterface;
use DomainException;

final class OrderRepository implements OrderRepositoryInterface
{
    public function findAllByUser(array $users): array
    {
        return Order::find()
            ->byStatusNew()
            ->byUsers($users)
            ->all();
    }

    public function save(Order $order): void
    {
        if (!$order->save()) {
            throw new DomainException('Не удалось сохранить заявку');
        }
    }
}
