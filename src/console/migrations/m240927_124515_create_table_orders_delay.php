<?php

use yii\db\Migration;


final class m240927_124515_create_table_orders_delay extends Migration
{
    public function up(): void
    {
        $this->createTable(
            \common\entities\OrderDelay::$tableName,
            [
                'id' => $this->primaryKey(),
                'value' => $this->integer(11),
                'work' => $this->string(5),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
            ]
        );
    }

    public function down(): void
    {
        $this->dropTable(
            \common\entities\OrderDelay::$tableName,
        );
    }
}
