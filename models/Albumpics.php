<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "albumpics".
 *
 * @property integer $id
 * @property string $caption
 * @property string $imgurl
 * @property integer $album_id
 */
class Albumpics extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'albumpics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caption', 'album_id'], 'required'],
            [['album_id'], 'integer'],
            [['caption'], 'string'],
            [['imgurl'], 'string', 'max' => 255],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, jpeg, gif, png'],
        ];
    }

    public function getAlbum()
    {
        return $this->hasOne(Album::className(), ['id' => 'album_id']);
    }

    function beforeSave($insert)
    {
      if (parent::beforeSave($insert)) {
        $this->caption = str_replace(["\r\n", "\n", "\r"], "<br>", Html::encode($this->caption));
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
            'caption' => '图片描述',
            'imgurl' => '影集图片',
            'album_id' => '所属影集',
        ];
    }
}
