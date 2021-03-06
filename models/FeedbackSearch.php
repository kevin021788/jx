<?php

namespace app\models;

use app\components\message\Language;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Feedback;

/**
 * FeedbackSearch represents the model behind the search form of `app\models\Feedback`.
 */
class FeedbackSearch extends Feedback
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'tel', 'phone', 'email', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Feedback::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);
        $tableName = self::tableName();

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            "{$tableName}.status" => $this->status,
        ]);

        if($this->created_at)
        {
            $beginTime = strtotime($this->created_at);
            $endTime = $beginTime+86400;
            $query->andFilterWhere(['AND',['>=','created_at',$beginTime],['<=','created_at',$endTime]]);
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(["{$tableName}.language" => Language::getLanguageNum()]);


        return $dataProvider;
    }
}
