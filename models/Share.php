<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "share".
 *
 * @property integer $id
 * @property string $openid
 * @property string $nickname
 * @property integer $sex
 * @property string $headimgurl
 * @property integer $count
 */
class Share extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'share';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex', 'count', 'lasttime'], 'integer'],
            [['openid', 'nickname', 'headimgurl'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => 'OpenID',
            'nickname' => '微信昵称',
            'sex' => '微信性别',
            'headimgurl' => '微信头像',
            'count' => '分享指数',
        ];
    }
}
