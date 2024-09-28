<?php

namespace common\repositories;

use common\entities\Order;
use common\entities\User;
use common\enums\OrderIsApprovedStatusEnum;
use common\repositories\interfaces\UserRepositoryInterface;
use Yii;

final class UserRepository implements UserRepositoryInterface
{
    public function findAllWithOrderIsApproved(): array
    {
        $db = Yii::$app->db;

        $sql = <<<SQL
SELECT
    "users".*,
    "orders".*
FROM "users"
    INNER JOIN orders ON users.id = orders.user_id
WHERE
    NOT EXISTS (
        SELECT *
        FROM "orders"
        WHERE "orders".user_id="users".id AND "orders".is_approved!='approved'
    )
SQL;

        return $db
            ->createCommand($sql)
            ->queryAll();
    }

    public function existsByIdAndIsApproved(int $id): bool
    {
        return User::find()
            ->byUser($id)
            ->innerJoinWith('orders')
            ->andWhere(
                [
                    Order::$tableName . '.is_approved' => OrderIsApprovedStatusEnum::STATUS_APPROVED->value,
                ]
            )
            ->exists();
    }
}
