<?php

namespace common\queries;

use common\components\AbstractQuery;
use common\entities\Order;
use common\enums\OrderDelayWorkStatusEnum;
use common\enums\OrderIsApprovedStatusEnum;

final class OrderQuery extends AbstractQuery
{
    public function byUsers(array $ids): self
    {
        return $this
            ->andWhere(
                [
                    'NOT IN', Order::$tableName . '.user_id', $ids,
                ]
            );
    }

    public function byStatusApproved(): self
    {
        return $this
            ->andWhere(
                [
                    Order::$tableName . '.is_approved' => OrderIsApprovedStatusEnum::STATUS_APPROVED->value,
                ]
            );
    }

    public function byStatusNew(): self
    {
        return $this
            ->andWhere(
                [
                    Order::$tableName . '.is_approved' => OrderIsApprovedStatusEnum::STATUS_NEW->value,
                ]
            );
    }
}
