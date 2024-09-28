<?php

namespace common\entities;

use common\components\AbstractModel;
use common\components\AbstractQuery;
use common\queries\UserQuery;
use yii\db\ActiveQuery;

final class User extends AbstractModel
{
    public static string $tableName = '{{%users}}';
    public static string $nameClassQuery = UserQuery::class;

    public function getOrders(): ActiveQuery
    {
        return $this->hasMany(
            Order::class,
            [
                'user_id' => 'id',
            ]
        );
    }
}
