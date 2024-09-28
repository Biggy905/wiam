<?php

use yii\db\Migration;


class m240927_072014_create_table_users extends Migration
{
    public function up(): void
    {
        $this->createTable(
            \common\entities\User::$tableName,
            [
                'id' => $this->primaryKey(),
                'username' => $this->string(64)->unique()->notNull(),
                'password' => $this->string(128)->notNull(),
                'name' => $this->string(64),
                'surname' => $this->string(64),
                'birthday' => $this->date(),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
            ]
        );
    }

    public function down(): void
    {
        $this->dropTable(
            \common\entities\User::$tableName,
        );
    }
}
