<?php

namespace common\repositories\interfaces;

use common\entities\OrderDelay;

interface OrderDelayRepositoryInterface
{
    public function findByStatusStartAndRepeat(): ?OrderDelay;
    public function save(OrderDelay $orderDelay): void;
}
