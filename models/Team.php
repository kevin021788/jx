<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $name
 * @property string $slogan
 * @property string $fdate
 * @property string $faddres
 * @property string $captain
 * @property string $logourl
 */
class Team extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    public function getTeammember()
    {
        return $this->hasMany(Teammember::className(), ['team_id' => 'id']);
    }

    public function getVote()
    {
        return $this->hasMany(Vote::className(), ['team_id' => 'id']);
    }

    public function getScore()
    {
      return $this->hasMany(Score::className(), ['team_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slogan', 'fdate', 'faddres', 'captain'], 'required'],
            [['name', 'slogan', 'fdate', 'faddres', 'captain'], 'string', 'max' => 255],
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
            'name' => '球队名称',
            'slogan' => '球队口号',
            'fdate' => '成立时间',
            'faddres' => '成立地址',
            'captain' => '球队队长',
            'logourl' => '球队Logo',
        ];
    }
}
