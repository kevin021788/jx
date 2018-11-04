<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property integer $id
 * @property string $name
 * @property string $logourl
 * @property string $intro
 * @property string $tel
 * @property string $email
 */
class Shop extends \yii\db\ActiveRecord
{
    public $image;
    public $image2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'intro', 'tel'], 'required'],
            [['name', 'logourl', 'intro', 'adurl', 'tel', 'email'], 'string', 'max' => 255],
            [['image', 'image2'], 'safe'],
            [['image', 'image2'], 'file', 'extensions'=>'jpg, jpeg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '商家名称',
            'logourl' => '商家Logo',
            'goodurl' => '商品图片',
            'intro' => '商家介绍',
            'adurl' => '跳转网址',
            'tel' => '商家电话',
            'email' => '商家邮箱',
        ];
    }
}
