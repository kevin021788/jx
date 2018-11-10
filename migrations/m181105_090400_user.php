<?php

use yii\db\Migration;

class m181105_090400_user extends Migration
{
    public static $tableName = '{{%user}}';
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable(self::$tableName, [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert(self::$tableName, [
            'username' => 'admin',
            'auth_key' => 'b7zsDPtKfK6YwgDQhuQhkVUNwHXUvHEg',
            'password_hash' => '$2y$13$QWNFR3q4TEqd2CwMRjSBB.ZXt1R0ni.juZTlwJREsaKRf0LjtTexS',
            'password_reset_token' => 'qaqMQXz5ef7f6APucSYZ9V151HNW8O7t_1527576370',
            'email' => 'kevin0217@126.com',
            'status' => 10,
            'created_at' => time(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable(self::$tableName);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
