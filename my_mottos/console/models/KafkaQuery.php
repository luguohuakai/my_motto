<?php

namespace console\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Kafka]].
 *
 * @see Kafka
 */
class KafkaQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Kafka[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kafka|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
