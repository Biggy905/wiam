<?php

namespace common\queries;

use common\components\AbstractQuery;
use common\entities\OrderDelay;
use common\enums\OrderDelayWorkStatusEnum;

final class OrderDelayQuery extends AbstractQuery
{
    public function byStatusStartAndRepeat(): self
    {
        return $this
            ->andWhere(
                [
                    'IN',
                    OrderDelay::$tableName . '.work',
                    [
                        OrderDelayWorkStatusEnum::STATUS_START->value,
                        OrderDelayWorkStatusEnum::STATUS_REPEAT->value,
                    ]
                ]
            );
    }
}
