<?php

namespace common\repositories\interfaces;

use common\entities\Order;

interface OrderRepositoryInterface
{
    public function findAllByUser(array $users): array;
    public function save(Order $order): void;
}
