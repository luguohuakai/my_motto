<?php

namespace console\models;

/**
 * This is the ActiveQuery class for [[SysConfig]].
 *
 * @see SysConfig
 */
class SysConfigQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SysConfig[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SysConfig|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
