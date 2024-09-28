<?php

namespace common\components;

use common\components\interfaces\AbstractModelInterface;
use common\components\interfaces\AbstractQueryInterface;
use yii\db\ActiveQuery;

abstract class AbstractQuery extends ActiveQuery implements AbstractQueryInterface
{
    public function byDeletedNull(AbstractModelInterface $abstractModel): ActiveQuery
    {
        return $this->andWhere(
            [
                $abstractModel::tableName() . '.deleted_at' => null,
            ]
        );
    }
}
