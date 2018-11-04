<?php

namespace app\models;

use Yii;
use app\models\Team;
use app\models\Competition;

/**
 * This is the model class for table "teamcompetition".
 *
 * @property integer $id
 * @property string $competition
 * @property integer $team_id
 */
class Teamcompetition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teamcompetition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['competition_id', 'team_id'], 'required'],
//            [['competition_id'], 'integer'],
        ];
    }

    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    public function getCompetition()
    {
        return $this->hasOne(Competition::className(), ['id' => 'competition_id']);
    }

    function beforeSave($insert)
    {
      if (parent::beforeSave($insert)) {
/*
        $ps = Yii::$app->request->post();
        list($competition_id,$competition_date) = explode('-',$ps['Teamcompetition']['competition_id']);
        $this->competition_id = $competition_id;
        $this->competition_date = $competition_date;
*/

        $this->team_id = implode('|', $this->team_id);

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
            'competition_id' => '赛程名称',
            'competition_date' => '赛程名称',
            'team_id' => '参赛球队',
        ];
    }
}
