<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%location}}".
 *
 * @property integer $localtion_id
 * @property string $localtion_name
 * @property string $localtion_alias
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ComputerVih[] $computerVihs
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%location}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['localtion_name', 'localtion_alias', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['localtion_name'], 'string', 'max' => 100],
            [['localtion_alias'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'localtion_id' => Yii::t('app', 'รหัสสาขา'),
            'localtion_name' => Yii::t('app', 'ชื่อสาขา'),
            'localtion_alias' => Yii::t('app', 'ชื่อเล่นสาขา'),
            'created_at' => Yii::t('app', 'สร้างวันที่'),
            'updated_at' => Yii::t('app', 'แก้ไขวันที่'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComputerVihs()
    {
        return $this->hasMany(ComputerVih::className(), ['computer_localtion' => 'localtion_id']);
    }

    /**
     * @inheritdoc
     * @return LocationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocationQuery(get_called_class());
    }
}
