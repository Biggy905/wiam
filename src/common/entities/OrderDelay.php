<?php

namespace common\entities;

use common\components\AbstractModel;
use common\components\AbstractQuery;
use common\queries\OrderDelayQuery;
use common\queries\OrderQuery;
use common\queries\UserQuery;
use yii\db\ActiveQuery;

/**
 *
 * @property-read User $user
 */
final class OrderDelay extends AbstractModel
{
    public static string $tableName = '{{%orders_delay}}';
    public static string $nameClassQuery = OrderDelayQuery::class;

    public function getUser(): ActiveQuery
    {
        return $this->hasOne(
            User::class,
            [
                'id' => 'user_id',
            ]
        );
    }
}
