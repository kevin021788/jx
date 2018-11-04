<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property integer $id
 * @property string $title
 * @property string $imgurl
 * @property integer $time
 */
class Album extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'album';
    }

    public function getAlbumpics()
    {
        return $this->hasMany(Albumpics::className(), ['album_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['time'], 'integer'],
            [['title', 'imgurl'], 'string', 'max' => 255],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, jpeg, gif, png'],
        ];
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '影集标题',
            'imgurl' => '封面图片',
            'time' => '创建时间',
        ];
    }
}
