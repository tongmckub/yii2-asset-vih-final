<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%software}}".
 *
 * @property integer $software_id
 * @property string $software_name
 * @property string $software_detail
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $updated_by
 * @property integer $is_status
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property SummaryOnSite[] $summaryOnSites
 */
class Software extends \yii\db\ActiveRecord {

    public function behaviors() {
        return [
            BlameableBehavior::className(),
            TimestampBehavior::className()
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%software}}';
    }

//    public static function find() {
//        return parent::find()->andWhere(['<>', 'is_status', 2]);
//    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['software_name', 'created_by', 'created_at', 'updated_at', 'updated_by'], 'required'],
            [['software_detail'], 'string'],
            [['created_by', 'created_at', 'updated_at', 'updated_by', 'is_status'], 'integer'],
            [['software_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'software_id' => Yii::t('app', 'เลขที่ซอฟต์แวร์'),
            'software_name' => Yii::t('app', 'ชื่อซอฟต์แวร์'),
            'software_detail' => Yii::t('app', 'รายละเอียดซอฟต์แวร์'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'created_at' => Yii::t('app', 'สร้างวันที่'),
            'updated_at' => Yii::t('app', 'วันที่แก้ไข'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
            'is_status'  => Yii::t('app', 'สถานะซอฟต์แวร์'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy() {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryOnSites() {
        return $this->hasMany(SummaryOnSite::className(), ['software_id' => 'software_id']);
    }

    /**
     * @inheritdoc
     * @return SoftwareQuery the active query used by this AR class.
     */
    public static function find() {
        return new SoftwareQuery(get_called_class());
    }

}
