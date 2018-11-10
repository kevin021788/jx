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

        $this->batchInsert(self::$tableName, ['name', 'title', 'value', 'remark', 'sort', 'status', 'created_at', 'updated_at', 'language'], [
            ['WEB_SITE_TITLE', '网站标题', '内容管理框架1', '网站标题前台显示标题', 9999, 1, 1378898976, 1541054975, 1],
            ['WEB_SITE_DESCRIPTION', '网站描述', '内容管理框架2', '网站搜索引擎描述', 1, 1, 1378898976, 1472528403, 1],
            ['WEB_SITE_KEYWORD', '网站关键字', '黄龙飞11', '网站搜索引擎关键字', 8, 1, 1378898976, 1472528403, 1],
            ['WEB_SITE_COPYRIGHT', '网站版权', '© China Radio International.CRI. All Rights Reserved.16A Shijingshan Road,Beijing,China.100040', '设置在网站', 9, 1, 1378900335, 1472528403, 1],
            ['WEB_SITE_RESOURCES_URL', '上传图片服务器域名（可用二级域名）', 'http://img.yiicms.com/', '域名格式（https://resources.alilinet.com/）', 3, 1, 1379053380, 1516948101, 1],
            ['COLOR_STYLE', '后台色系', 'default_color', '后台颜色风格', 10, 1, 1379122533, 1472528403, 1],
            ['WEB_SITE_ALLOW_UPLOAD_TYPE', '站点允许上传文件类型', 'jpg,rar,png,gif,rar', '只需要填写后缀即可', 1, 1, 1512626843, 1517147572, 1],
            ['OAUTH_QQ', '第三方QQ登录配置项', '{\r\n	"client_id": "**********",\r\n	"client_secret": "**********",\r\n	"redirect_uri": "**********"\r\n}', '配置项', 1, 1, 1516869590, 1539942431, 1],
            ['WEB_SITE_AJAX_URL', '网站AJAX请求域名', 'https://www.alilinet.com/', '网站AJAX请求域名', 2, 1, 1516869798, 1516948115, 1],
            ['WEB_SITE_BACKGROUND', '站点头部背景图', '/images/background.jpg', '站点头部背景图', 3, 1, 1516949337, 1516949390, 1],
            ['NETEASE_COOKIE', '网易云音乐cookie', '888888', '网易云音乐cookie', 1, 1, 1527666426, 1539942454, 1],
            ['WEB_SITE_TEL', '服务电话', '0086-13556194195', NULL, 0, 1, 1541401973, 1541401973, 1],
            ['WEB_SITE_MAIL', '服务邮箱', '123456789@qq.com', NULL, 0, 1, 1541401973, 1541401973, 1],
            ['WEB_SITE_ADDRESS', '地址', 'Room 1306, office building, Shuangcheng International Building,', NULL, 0, 1, 1541401973, 1541401973, 1],
            ['WEB_SITE_TITLE', '网站标题', '内容管理框架3', '网站标题前台显示标题', 0, 0, 1378898976, 1510118190, 2],
            ['WEB_SITE_DESCRIPTION', '网站描述', '内容管理框架4', '网站搜索引擎描述', 1, 0, 1378898976, 1472528403, 2],
            ['WEB_SITE_KEYWORD', '网站关键字', '黄龙飞11', '网站搜索引擎关键字', 8, 0, 1378898976, 1472528403, 2],
            ['WEB_SITE_CLOSE', '网站关闭', '0', '网站关闭', 0, 0, 1379122533, 1379122533, 2],
            ['WEB_SITE_COPYRIGHT', '网站版权', '© China Radio International.CRI. All Rights Reserved.16A Shijingshan Road,Beijing,China.100040', '设置在网站底部', 9, 0, 1378900335, 1472528403, 2],
            ['WEB_SITE_RESOURCES_URL', '上传图片服务器域名（可用二级域名）', 'http://img.yiicms.com/', '域名格式（https://resources.alilinet.com/）', 3, 0, 1379053380, 1516948101, 2],
            ['COLOR_STYLE', '后台色系', 'default_color', '后台颜色风格', 10, 1, 1379122533, 1472528403, 2],
            ['WEB_SITE_ALLOW_UPLOAD_TYPE', '站点允许上传文件类型', 'jpg,rar,png,gif,rar', '只需要填写后缀即可', 1, 1, 1512626843, 1517147572, 2],
            ['OAUTH_QQ', '第三方QQ登录配置项', '{\r\n	"client_id": "**********",\r\n	"client_secret": "**********",\r\n	"redirect_uri": "**********"\r\n}', '配置项', 1, 1, 1516869590, 1539942431, 2],
            ['WEB_SITE_AJAX_URL', '网站AJAX请求域名', 'https://www.alilinet.com/', '网站AJAX请求域名', 2, 1, 1516869798, 1516948115, 2],
            ['WEB_SITE_BACKGROUND', '站点头部背景图', '/images/background.jpg', '站点头部背景图', 3, 1, 1516949337, 1516949390, 2],
            ['NETEASE_COOKIE', '网易云音乐cookie', '888888', '网易云音乐cookie', 1, 1, 1527666426, 1539942454, 2],
            ['WEB_SITE_TEL', '服务电话', '0086-13556194195', NULL, 0, 1, 1541401973, 1541401973, 2],
            ['WEB_SITE_MAIL', '服务邮箱', '123456789@qq.com', NULL, 0, 1, 1541401973, 1541401973, 2],
            ['WEB_SITE_ADDRESS', '地址', 'Room 1306, office building, Shuangcheng International Building,', NULL, 0, 1, 1541401973, 1541401973, 2],
            ['WEB_SITE_TITLE', '网站标题', 'عنوان', '网站标题前台显示标题', 0, 0, 1378898976, 1510118190, 3],
            ['WEB_SITE_DESCRIPTION', '网站描述', 'شرح', '网站搜索引擎描述', 1, 0, 1378898976, 1472528403, 3],
            ['WEB_SITE_KEYWORD', '网站关键字', 'کلید واژه ها', '网站搜索引擎关键字', 8, 0, 1378898976, 1472528403, 3],
            ['WEB_SITE_CLOSE', '网站关闭', '0', '网站关闭', 0, 0, 1379122533, 1379122533, 3],
            ['WEB_SITE_COPYRIGHT', '网站版权', '© چین رادیو بین المللی .CRI. همه حقوق محفوظ است.', '设置在网站底部显示', 9, 0, 1378900335, 1472528403, 3],
            ['WEB_SITE_RESOURCES_URL', '上传图片服务器域名（可用二级域名）', 'http://img.yiicms.com/', '域名格式（https://resources.alilinet.com/）', 3, 0, 1379053380, 1516948101, 3],
            ['COLOR_STYLE', '后台色系', 'default_color', '后台颜色风格', 10, 1, 1379122533, 1472528403, 3],
            ['WEB_SITE_ALLOW_UPLOAD_TYPE', '站点允许上传文件类型', 'jpg,rar,png,gif,rar', '只需要填写后缀即可', 1, 1, 1512626843, 1517147572, 3],
            ['OAUTH_QQ', '第三方QQ登录配置项', '{\r\n	"client_id": "**********",\r\n	"client_secret": "**********",\r\n	"redirect_uri": "**********"\r\n}', '配置项', 1, 1, 1516869590, 1539942431, 3],
            ['WEB_SITE_AJAX_URL', '网站AJAX请求域名', 'https://www.alilinet.com/', '网站AJAX请求域名', 2, 1, 1516869798, 1516948115, 3],
            ['WEB_SITE_BACKGROUND', '站点头部背景图', '/images/background.jpg', '站点头部背景图', 3, 1, 1516949337, 1516949390, 3],
            ['NETEASE_COOKIE', '网易云音乐cookie', '888888', '网易云音乐cookie', 1, 1, 1527666426, 1539942454, 3],
            ['WEB_SITE_TEL', '服务电话', '0086-13556194195', NULL, 0, 1, 1541401973, 1541401973, 3],
            ['WEB_SITE_MAIL', '服务邮箱', '123456789@qq.com', NULL, 0, 1, 1541401973, 1541401973, 3],
            ['WEB_SITE_ADDRESS', '地址', 'Room 1306, office building, Shuangcheng International Building,', '', 0, 1, 1541401973, 1541401973, 3],
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
