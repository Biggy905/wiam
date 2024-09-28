<?php

namespace common\entities;

use common\components\AbstractModel;
use common\components\AbstractQuery;
use common\queries\OrderQuery;
use common\queries\UserQuery;
use yii\db\ActiveQuery;

/**
 *
 * @property-read User $user
 */
final class Order extends AbstractModel
{
    public static string $tableName = '{{%orders}}';
    public static string $nameClassQuery = OrderQuery::class;

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
