<?php

namespace common\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "{{%division}}".
 *
 * @property integer $division_id
 * @property string $division_name
 *
 * @property ComputerVih[] $computerVihs
 */
class Division extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%division}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['division_name'], 'required'],
            [['division_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'division_id' => Yii::t('app', 'รหัสฝ่าย'),
            'division_name' => Yii::t('app', 'ชื่อฝ่าย'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComputerVihs()
    {
        return $this->hasMany(ComputerVih::className(), ['division_id' => 'division_id']);
    }

    /**
     * @inheritdoc
     * @return DivisionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DivisionQuery(get_called_class());
    }
}
