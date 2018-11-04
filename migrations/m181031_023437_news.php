<?php

use yii\db\Migration;

class m181031_023437_news extends Migration
{
    public static $tableName = '{{%news}}';
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
            'id' => $this->primaryKey()->comment('ID'),
            'cat_id' => $this->integer(11)->defaultValue(0)->comment('category Id'),
            'name' => $this->string(50)->comment('Name'),
            'slug' => $this->string(250)->comment('Slug'),
            'imgUrl' => $this->string(255)->comment('imgUrl'),
            'desc' => $this->string(255)->comment('Description'),
            'content' => $this->text()->comment('Content'),
            'sort' => $this->integer(11)->defaultValue(0)->comment('Sort'),
            'status' => $this->integer(2)->defaultValue(1)->comment('Status：0-UnActive，1-Active'),
            'created_at' => $this->integer(10)->comment('Create Time'),
            'updated_at' => $this->integer(10)->comment('Modify Time'),
            'language' => $this->integer(2)->defaultValue(1)->comment('Language Type'),
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
