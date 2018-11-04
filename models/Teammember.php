<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teammember".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property integer $team_id
 * @property string $gender
 * @property string $years
 */
class Teammember extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teammember';
    }

    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'team_id'], 'required'],
            [['team_id'], 'integer'],
            [['name', 'icon', 'gender', 'years'], 'string', 'max' => 255],
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
            'name' => '队员名字',
            'icon' => '队员头像',
            'team_id' => '所属球队',
            'gender' => '队员性别',
            'years' => '队员球龄',
        ];
    }
}
