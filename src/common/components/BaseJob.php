<?php

namespace common\components;

use yii\base\InvalidCallException;
use DateTimeImmutable;
use Yii;

abstract class BaseJob
{
    public function execute($queue): void
    {
        if (method_exists($this, 'exec')) {
            Yii::$container->invoke([$this, 'exec']);
        } else {
            throw new InvalidCallException('Method "exec" does not exist');
        }
    }

    protected function log(string $message): void
    {
        $date = (new DateTimeImmutable())->format('Y-m-d H:i:s.u');
        echo "[$date] $message" . PHP_EOL;
    }
}
