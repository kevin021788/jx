<?php
/**
 * Created by kevin0217@126.com
 * User: 曾剑杰
 * Date: 2018-10-31
 * Time: 14:12
 */

namespace app\models;


/**
 * This is the ActiveQuery class for [[Config]].
 *
 * @see Config
 */
class ConfigQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Config[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Config|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
