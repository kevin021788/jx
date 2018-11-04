<?php

use yii\db\Migration;

class m181101_021024_config extends Migration
{
    public static $tableName = '{{%config}}';
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
            'id' => $this->primaryKey(11)->unsigned()->notNull()->comment('配置ID'),
            'name' => $this->string(30)->null()->comment('配置名称'),
            'title' => $this->string(50)->null()->comment('配置说明'),
            'value' => $this->text()->null()->comment('配置值'),
            'remark' => $this->string(100)->null()->comment('配置说明'),
            'sort' => $this->integer(11)->defaultValue(0)->comment('排序'),
            'status' => $this->integer(4)->defaultValue(1)->comment('状态'),
            'created_at' => $this->integer(4)->defaultValue(0)->comment('创建时间'),
            'updated_at' => $this->integer(4)->defaultValue(0)->comment('更新时间'),
            'language' => $this->integer(4)->defaultValue(0)->comment('所属语言'),
            'UNIQUE INDEX `index` (`name`, `id`, `language`) USING BTREE',
        ], $tableOptions);
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
