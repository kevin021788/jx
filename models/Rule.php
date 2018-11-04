<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rule".
 *
 * @property integer $id
 * @property string $competition_rule
 * @property string $vote_rule
 */
class Rule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['competition_rule', 'vote_rule', 'vote_awarding'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'competition_rule' => '赛程规格',
            'vote_rule' => '投票规格',
            'vote_awarding' => '兑奖规则',
        ];
    }
}
