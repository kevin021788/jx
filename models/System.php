<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "system".
 *
 * @property integer $id
 * @property integer $visit
 * @property string $title
 * @property string $logo
 */
class System extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visit', 'vote_status'], 'integer'],
            [['title', 'logo'], 'string', 'max' => 255],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, jpeg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'visit' => '访问量',
            'vote_status' => '投票状态',
            'title' => '首页标题',
            'logo' => '首页LOGO',
        ];
    }
}
