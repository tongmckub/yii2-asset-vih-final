<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "{{%department}}".
 *
 * @property integer $department_id
 * @property string $department_name
 * @property integer $party_id
 *
 * @property ComputerVih[] $computerVihs
 * @property Party $party
 */
class Department extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%department}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['department_id', 'party_id'], 'integer'],
            [['department_name'], 'string', 'max' => 38]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'department_id' => Yii::t('app', 'Department ID'),
            'department_name' => Yii::t('app', 'Department Name'),
            'party_id' => Yii::t('app', 'Party ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComputerVihs() {
        return $this->hasMany(ComputerVih::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParty() {
        return $this->hasOne(Party::className(), ['party_id' => 'party_id']);
    }

    /**
     * @inheritdoc
     * @return DepartmentQuery the active query used by this AR class.
     */
    public static function find() {
        return new DepartmentQuery(get_called_class());
    }

    public static function getOptionsbyParty($party_id) {
        $data = static::find()->where(['party_id' => $party_id])->select(['department_id', 'department_name'])->asArray()->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;

        return $value;
    }

}
