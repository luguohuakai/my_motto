<?php

namespace console\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "kafka".
 *
 * @property integer $id
 * @property string $topic
 * @property string $part
 * @property integer $offset
 * @property integer $size
 * @property integer $crc
 * @property integer $magic
 * @property integer $attr
 * @property integer $timestamp
 * @property string $key
 * @property string $value
 * @property string $message
 */
class Kafka extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kafka';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offset', 'size', 'crc', 'magic', 'attr', 'timestamp', 'key', 'value'], 'required'],
            [['offset', 'size', 'crc', 'magic', 'attr', 'timestamp'], 'integer'],
            [['topic', 'part', 'key', 'value'], 'string', 'max' => 255],
            [['message'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'topic' => Yii::t('app', 'Topic'),
            'part' => Yii::t('app', 'Part'),
            'offset' => Yii::t('app', 'Offset'),
            'size' => Yii::t('app', 'Size'),
            'crc' => Yii::t('app', 'Crc'),
            'magic' => Yii::t('app', 'Magic'),
            'attr' => Yii::t('app', 'Attr'),
            'timestamp' => Yii::t('app', 'Timestamp'),
            'key' => Yii::t('app', 'Key'),
            'value' => Yii::t('app', 'Value'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

    /**
     * @inheritdoc
     * @return KafkaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KafkaQuery(get_called_class());
    }
}
