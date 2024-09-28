<?php

namespace console\fixtures;

use common\entities\User;
use yii\test\ActiveFixture;

final class UserFixture extends ActiveFixture
{
    public $modelClass = User::class;
    public $dataFile = '@console/fixtures/data/user.php';
}
