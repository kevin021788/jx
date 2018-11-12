<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;
use yii\helpers\ArrayHelper;
use app\components\message\Language;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property integer $parentId
 * @property string $idPath
 * @property string $name
 * @property string $model
 * @property integer $sort
 * @property integer $status
 * @property integer $language
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentId', 'sort', 'status', 'language'], 'integer'],
            [['idPath'], 'string', 'max' => 255],
            [['name', 'model'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentId' => 'Parent ID',
            'idPath' => 'Id Path',
            'name' => 'Name',
            'model' => 'Model',
            'sort' => 'Sort',
            'status' => 'Status',
            'language' => 'Language',
        ];
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
                    ActiveRecord::EVENT_BEFORE_INSERT => ['parentId'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['parentId'],
                ],
                'value'      => function ($event) {
                    $arr = ArrayHelper::toArray($event->sender);
                    return empty($arr['parentId'])?0:$arr['parentId'];
                },
            ],
            [
                'class'      => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_INSERT => ['idPath'],
                ],
                'value'      => function ($event) {
                    $arr = ArrayHelper::toArray($event->sender);
                    $idPath = self::getIdPath($arr['parentId'], $arr['id']);
                    self::updateIdPath($arr['id'], $idPath);
                },
            ],
            [
                'class'      => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['idPath'],
                ],
                'value'      => function ($event) {
                    $arr = ArrayHelper::toArray($event->sender);
                    $idPath = self::getIdPath($arr['parentId'], $arr['id']);
                    return $idPath;
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
     * 组装idPath
     * @param $parentId
     * @param $id
     * @return string
     */
    public static function getIdPath($parentId, $id)
    {
        $rs = self::find()->where(['id' => $parentId])->asArray()->one();
        if (empty($rs)) {
            return '/0/' . $id . '/';
        } else {
            return $rs['idPath'] . $id . '/';
        }
    }

    /**
     * 更新idPath
     * @param $id
     * @param $idPath
     * @return bool
     */
    public static function updateIdPath($id, $idPath)
    {
        $model = self::findOne($id);
        $model->idPath = $idPath;
        if ($model->save() !== false) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * 更新前触发此事件
     * @param $event
     */
    public static function updateOtherIdPath($event)
    {
        $arr = $event->sender;
        $rs = self::find()->where(['parentId' => $arr['id']])->asArray()->all();
        $sql = 'UPDATE '.self::tableName().' SET idPath=:idPath WHERE id=:id';
        $command = Yii::$app->db->createCommand($sql);
        $idPath = self::getIdPath($arr['parentId'], $arr['id']);
        foreach ($rs as $k => $v) {
            if (empty($v)) continue;
            $command->bindValues([
                ':id' => $v['id'],
                ':idPath' => $idPath . $v['id'] . '/',
            ])->execute();
        }
    }

    /**
     * 获取所有指定$model的分类
     * @param $model
     * @return array
     */
    public static function getCategory($model)
    {
        $model = replaceBackend($model);
        if('category'===strtolower($model))
            return ArrayHelper::map(ArrayHelper::toArray(self::find()->where(['status'=>1, 'language'=>Language::getLanguageNum()])->orderby('idPath asc')->all()),'id','name');
        else
            return ArrayHelper::map(ArrayHelper::toArray(self::find()->where(['status'=>1, 'model'=>$model , 'language'=>Language::getLanguageNum()])->orderby('idPath asc')->all()),'id','name');
    }

    /**
     * {@inheritdoc}
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    /**
     * 前台分类列表
     * @param $model
     * @return Category[]|array
     */
    public static function getCategoryList($model)
    {
        return self::find()->where(['model' => $model,'status'=>1,'language'=>Language::getLanguageNum()])->orderBy(['sort'=>'asc','id'=>'desc'])->asArray()->all();
    }
}
