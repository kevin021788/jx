<?php

namespace app\models;

use Yii;
use app\components\message\Language;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $imgUrl
 * @property string $tel
 * @property string $phone
 * @property string $email
 * @property string $content
 * @property integer $sort
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $language
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%feedback}}';
    }
    /**
     * 行为
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class'      => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at','updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value'      => function ($event) {
                    return time();//填充值
                },
            ],
            [
                'class'      => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['language'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'language',
                ],
                'value'      => function ($event) {
                    return Language::getLanguageNum();//填充值
                },
            ],

        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['sort', 'status', 'created_at', 'updated_at', 'language'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['slug'], 'string', 'max' => 250],
            [['imgUrl', 'tel', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('home','ID'),
            'name' => Yii::t('home','Name'),
            'slug' => Yii::t('home','Slug'),
            'imgUrl' => Yii::t('home','Img Url'),
            'tel' => Yii::t('home','Tel'),
            'phone' => Yii::t('home','Phone'),
            'email' => Yii::t('home','Email'),
            'content' => Yii::t('home','Content'),
            'sort' => Yii::t('home','Sort'),
            'status' => Yii::t('home','Status'),
            'created_at' => Yii::t('home','Created At'),
            'updated_at' => Yii::t('home','Updated At'),
            'language' => Yii::t('home','Language'),
        ];
    }

    public function addFeedback()
    {
        safe();

    }
}
