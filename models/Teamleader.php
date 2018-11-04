<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teamleader".
 *
 * @property integer $id
 * @property string $openid
 * @property string $nickname
 * @property integer $sex
 * @property string $headimgurl
 */
class Teamleader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teamleader';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['openid'], 'required'],
            [['sex'], 'integer'],
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
            'openid' => '微信OpenID',
            'nickname' => '微信昵称',
            'sex' => '微信性别',
            'headimgurl' => '微信头像',
        ];
    }
}
