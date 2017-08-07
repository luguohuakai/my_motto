<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "sys_config".
 *
 * @property string $sysid
 * @property string $sysname
 * @property string $msgtopic
 */
class SysConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sysid', 'sysname', 'msgtopic'], 'required'],
            [['sysid'], 'string', 'max' => 5],
            [['sysname', 'msgtopic'], 'string', 'max' => 20],
            [['sysid'], 'unique'],
            [['msgtopic'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sysid' => Yii::t('app', '系统编号(唯一)'),
            'sysname' => Yii::t('app', '系统名称'),
            'msgtopic' => Yii::t('app', '队列标识(唯一)'),
        ];
    }

    /**
     * @inheritdoc
     * @return SysConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SysConfigQuery(get_called_class());
    }
}
