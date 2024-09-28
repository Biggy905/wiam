<?php

namespace console\fixtures;

use common\entities\Order;
use yii\test\ActiveFixture;

final class OrderFixture extends ActiveFixture
{
    public $modelClass = Order::class;
    public $dataFile = '@console/fixtures/data/order.php';
}
