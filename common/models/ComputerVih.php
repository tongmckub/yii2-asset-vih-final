<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%computer_vih}}".
 *
 * @property integer $computer_id
 * @property string $asset_code
 * @property integer $party_id
 * @property integer $department_id
 * @property string $of_user
 * @property string $serial_no
 * @property string $computer_localtion
 * @property string $computer_name
 * @property string $ip
 * @property string $mac_address
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $is_status
 *
 * @property User $createdBy
 * @property Department $department
 * @property Party $party
 * @property User $updatedBy
 * @property SummaryOnSite[] $summaryOnSites
 */
class ComputerVih extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%computer_vih}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asset_code', 'party_id', 'department_id', 'of_user', 'serial_no', 'computer_localtion', 'created_by', 'updated_by'], 'required'],
            [['party_id', 'department_id', 'created_by', 'updated_by', 'is_status'], 'integer'],
            [['asset_code', 'mac_address'], 'string', 'max' => 17],
            [['of_user'], 'string', 'max' => 20],
            [['serial_no'], 'string', 'max' => 24],
            [['computer_localtion'], 'string', 'max' => 3],
            [['computer_name'], 'string', 'max' => 40],
            [['ip'], 'string', 'max' => 13]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'computer_id' => Yii::t('app', 'รหัสคอมพิวเตอร์'),
            'asset_code' => Yii::t('app', 'รหัสทรพย์สิน'),
            'party_id' => Yii::t('app', 'ฝ่าย'),
            'department_id' => Yii::t('app', 'แผนก'),
            'of_user' => Yii::t('app', 'ผู้ใช้เครื่อง'),
            'serial_no' => Yii::t('app', 'ซีเรียลนัมเบอร์'),
            'computer_localtion' => Yii::t('app', 'ที่ตั้งของเครื่อง'),
            'computer_name' => Yii::t('app', 'Computer Name'),
            'ip' => Yii::t('app', 'Ip'),
            'mac_address' => Yii::t('app', 'Mac Address'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
            'is_status' => Yii::t('app', 'สถานะเครื่อง'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser1()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParty()
    {
        return $this->hasOne(Party::className(), ['party_id' => 'party_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryOnSites()
    {
        return $this->hasMany(SummaryOnSite::className(), ['computer_id' => 'computer_id']);
    }

    /**
     * @inheritdoc
     * @return ComputerVihQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ComputerVihQuery(get_called_class());
    }
}
