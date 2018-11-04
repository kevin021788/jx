<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "score".
 *
 * @property integer $id
 * @property string $competition
 * @property string $competition_date
 * @property integer $score
 * @property integer $ranking
 * @property integer $team_id
 */
class Score extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'score';
    }

    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $ps = Yii::$app->request->post();
            list($competition,$competition_date) = explode('-',$ps['Score']['competition']);
            $this->competition_date = $competition_date;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['competition', 'score', 'ranking', 'team_id'], 'required'],
            [['score', 'ranking', 'team_id'], 'integer'],
            [['competition', 'competition_date'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'competition' => '赛事名称',
            'competition_date' => '赛事名称',
            'score' => '总杆数',
            'ranking' => '排名',
            'team_id' => '所属球队',
        ];
    }
}
