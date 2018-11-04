<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vote".
 *
 * @property integer $id
 * @property integer $poll
 * @property integer $team_id
 */
class Vote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['team_id', 'time'], 'integer'],
            [['team_id'], 'required'],
        ];
    }

    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    function beforeSave($insert)
    {
      if (parent::beforeSave($insert)) {
        if ($insert) {
          //固定一次投一票
          $this->poll = 1;
          $this->time = time();
          $this->ip = Yii::$app->request->getUserIP();
          $this->openid = Yii::$app->session->get('wx_openid');
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
            'poll' => '票数',
            'team_id' => '所属球队',
            'time' => '最新时间',
            'ip' => 'IP',
        ];
    }
}
