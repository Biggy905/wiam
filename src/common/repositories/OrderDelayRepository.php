<?php

namespace common\repositories;

use common\entities\OrderDelay;
use common\repositories\interfaces\OrderDelayRepositoryInterface;
use DomainException;

final class OrderDelayRepository implements OrderDelayRepositoryInterface
{
    public function findByStatusStartAndRepeat(): ?OrderDelay
    {
        return OrderDelay::find()
            ->byStatusStartAndRepeat()
            ->orderBy('id')
            ->one();
    }

    public function save(OrderDelay $orderDelay): void
    {
        if (!$orderDelay->save()) {
            throw new DomainException('Не удалось сохранить время для принятии решении');
        }
    }
}
