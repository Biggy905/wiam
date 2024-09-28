<?php

use yii\db\Migration;


final class m240927_070923_create_table_orders extends Migration
{
    public function up(): void
    {
        $this->createTable(
            \common\entities\Order::$tableName,
            [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer(11),
                'set_order_delay_id' => $this->integer(11),
                'amount' => $this->integer(11),
                'term' => $this->integer(11),
                'is_approved' => $this->string(9),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
            ]
        );

        $this->createIndex(
            'idx_orders_is_approved',
            \common\entities\Order::$tableName,
            'is_approved'
        );
    }

    public function down(): void
    {
        $this->dropIndex(
            'idx_orders_is_approved',
            \common\entities\Order::$tableName,
        );

        $this->dropTable(
            \common\entities\Order::$tableName,
        );
    }
}
