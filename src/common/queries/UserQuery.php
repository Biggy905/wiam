<?php

namespace common\queries;

use common\components\AbstractQuery;
use common\entities\User;

final class UserQuery extends AbstractQuery
{
    public function byUser(int $id): self
    {
        return $this->andWhere(
            [
                User::$tableName . '.id' => $id,
            ]
        );
    }
}
