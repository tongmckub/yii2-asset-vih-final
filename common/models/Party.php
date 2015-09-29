<?php

namespace common\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "{{%party}}".
 *
 * @property integer $party_id
 * @property string $party_name
 *
 * @property ComputerVih[] $computerVihs
 * @property Department[] $departments
 */
class Party extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%party}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['party_name'], 'required'],
            [['party_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'party_id' => Yii::t('app', 'Party ID'),
            'party_name' => Yii::t('app', 'Party Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComputerVihs() {
        return $this->hasMany(ComputerVih::className(), ['party_id' => 'party_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments() {
        return $this->hasMany(Department::className(), ['party_id' => 'party_id']);
    }

    /**
     * @inheritdoc
     * @return PartyQuery the active query used by this AR class.
     */
    public static function find() {
        return new PartyQuery(get_called_class());
    }

    public static function getOptions() {
        $data = static::find()->all();
        $value = (count($data) == 0) ? ['' => ''] : \yii\helpers\ArrayHelper::map($data, 'party_id', 'party_name');

        return $value;
    }

}
