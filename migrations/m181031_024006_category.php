<?php

use yii\db\Migration;

class m181031_024006_category extends Migration
{
    public static $tableName = '{{%category}}';
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
            'id' => $this->primaryKey(11)->unsigned()->notNull()->comment('分类ID'),
            'parentId' => $this->integer(11)->notNull()->defaultValue(0)->comment('父类ID'),
            'idPath' => $this->string(255)->null()->comment('分类ID路径'),
            'name' => $this->string(50)->null()->comment('分类名称'),
            'model' => $this->string(50)->null()->comment('模块名称'),
            'sort' => $this->integer(11)->defaultValue(0)->comment('排序'),
            'status' => $this->integer(4)->defaultValue(1)->comment('状态'),
            'language' => $this->integer(4)->defaultValue(0)->comment('所属语言'),
            'KEY `parentId` (`parentId`)',
            'KEY `language` (`language`)',
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
