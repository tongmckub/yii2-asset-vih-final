<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%computer_vih}}".
 *
 * @property integer $computer_id
 * @property string $asset_code
 * @property integer $division_id
 * @property string $of_user
 * @property string $serial_no
 * @property string $computer_localtion
 * @property string $computer_name
 * @property string $ip
 * @property string $mac_address
 * @property integer $created_by
 *
 * @property Division $division
 * @property User $createdBy
 * @property SummaryOnSite[] $summaryOnSites
 */
class ComputerVih extends \yii\db\ActiveRecord
{
    public function behaviors(){
      return [
        BlameableBehavior::className(),
       // TimestampBehavior::className()
      ];
    }
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
            [['asset_code', 'division_id'], 'required'],
            [['division_id', 'created_by','updated_by'], 'integer'],
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
            'computer_id' => 'รหัสคอมพิวเตอร์',
            'asset_code' => 'รหัสทรพย์สิน',
            'division_id' => 'ฝ่าย',
            'of_user' => 'ผู้ใช้เครื่อง',
            'serial_no' => 'ซีเรียลนัมเบอร์',
            'computer_localtion' => 'ที่ตั้งของเครื่อง',
            'computer_name' => 'Computer Name',
            'ip' => 'Ip',
            'mac_address' => 'Mac Address',
            'created_by' => 'สร้างโดย',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivision()
    {
        return $this->hasOne(Division::className(), ['division_id' => 'division_id']);
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
