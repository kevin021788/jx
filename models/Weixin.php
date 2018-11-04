<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weixin".
 *
 * @property integer $id
 * @property string $openid
 * @property integer $lasttime
 */
class Weixin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weixin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lasttime'], 'integer'],
            [['openid'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => 'Openid',
            'lasttime' => 'Lasttime',
        ];
    }
}
