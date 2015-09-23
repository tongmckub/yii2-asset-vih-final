<?php

namespace common\models;

use Yii;
//add date auto
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%summary_on_site}}".
 *
 * @property integer $summary_id
 * @property integer $software_id
 * @property integer $computer_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ComputerVih $computer
 * @property User $createdBy
 * @property Software $software
 * @property User $updatedBy
 */
class SummaryOnSite extends \yii\db\ActiveRecord
{
    public function behaviors() {
        return[
            BlameableBehavior::className(),
            TimestampBehavior::className()
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%summary_on_site}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['software_id', 'computer_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['software_id', 'computer_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'summary_id' => Yii::t('app', 'Summary ID'),
            'software_id' => Yii::t('app', 'รหัสซอฟต์แวร์'),
            'computer_id' => Yii::t('app', 'รหัสคอมพิวเตอร์'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
            'created_at' => Yii::t('app', 'สร้างวันที่'),
            'updated_at' => Yii::t('app', 'แก้ไขวันที่'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComputer()
    {
        return $this->hasOne(ComputerVih::className(), ['computer_id' => 'computer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftware()
    {
        return $this->hasOne(Software::className(), ['software_id' => 'software_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @inheritdoc
     * @return SummaryOnSiteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SummaryOnSiteQuery(get_called_class());
    }
}
