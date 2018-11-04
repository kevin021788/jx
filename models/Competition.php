<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competition".
 *
 * @property integer $id
 * @property string $name
 * @property integer $time
 * @property integer $com_time
 * @property string $addres
 * @property integer $teams
 * @property string $imgurl
 * @property string $awards
 * @property string $expenses
 * @property string $tel
 */
class Competition extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'competition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'time', 'com_time', 'addres', 'teams'], 'required'],
            [['teams'], 'integer'],
            [['name', 'addres', 'imgurl', 'awards', 'expenses', 'tel'], 'string', 'max' => 255],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, jpeg, gif, png'],
        ];
    }

    public function getTeamcompetition()
    {
      return $this->hasOne(Teamcompetition::className(), ['competition_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '赛程名称',
            'time' => '赛程时间',
            'com_time' => '赛程日期',
            'addres' => '赛程地点',
            'teams' => '参加队数',
            'imgurl' => '赛程图片',
            'awards' => '奖项设置',
            'expenses' => '赛事费用',
            'tel' => '联系人',
        ];
    }
}
