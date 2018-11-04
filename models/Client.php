<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $phone
 * @property integer $shop_id
 * @property integer $time
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    function beforeSave($insert)
    {
      if (parent::beforeSave($insert)) {
        if ($insert) {
          $this->time = time();
        }
        return true;
      } else {
        return false;
      }
    }

    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['id' => 'shop_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'shop_id'], 'required'],
            [['shop_id', 'time'], 'integer'],
            [['phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => '客户电话',
            'shop_id' => '所属商家',
            'time' => '预约时间',
        ];
    }
}
