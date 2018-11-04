<?php
/**
 * Created by kevin0217@126.com
 * User: 曾剑杰
 * Date: 2018-10-31
 * Time: 15:31
 */

namespace app\models;


use app\components\message\Language;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Config;

/**
 * CategorySearch represents the model behind the search form of `app\models\Category`.
 */
class ConfigSearch extends Config
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sort', 'status', 'language'], 'integer'],
            [['name', 'title', 'created_at', 'value'], 'safe'],
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
        $query = Config::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sort' => $this->sort,
            'status' => $this->status,
        ]);
        $tableName = self::tableName();
        if($this->created_at)
        {
            $beginTime = strtotime($this->created_at);
            $endTime = $beginTime+86400;
            $query->andFilterWhere(['AND',['>=','created_at',$beginTime],['<=','created_at',$endTime]]);
        }
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(["{$tableName}.language" => Language::getLanguageNum()])
            ->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
