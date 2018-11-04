<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Score;

/**
 * ScoreSearch represents the model behind the search form about `app\models\Score`.
 */
class ScoreSearch extends Score
{
    public function rules()
    {
        return [
            [['id', 'score', 'ranking', 'team_id'], 'integer'],
            [['competition'], 'safe'],
        ];
    }

    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        // $query = Score::find();
        $query = Score::find()->joinWith(['team'])->orderBy('team.name DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'score' => $this->score,
            'ranking' => $this->ranking,
            'team_id' => $this->team_id,
        ]);

        $query->andFilterWhere(['like', 'competition', $this->competition]);

        return $dataProvider;
    }
}
