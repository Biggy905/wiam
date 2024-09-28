<?php

namespace common\components;

use common\components\AbstractQuery;
use common\queries\UserQuery;
use yii\db\ActiveRecord;

abstract class AbstractModel extends ActiveRecord
{
    public static function tableName(): string
    {
        return static::$tableName;
    }

    public static function find(): AbstractQuery
    {
        return (new static::$nameClassQuery(get_called_class()))
            ->andWhere(
                [
                    static::$tableName . '.deleted_at' => null,
                ]
            );
    }
}
