<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%events}}".
 *
 * @property integer $event_id
 * @property string $event_title
 * @property string $event_detail
 * @property string $event_start_date
 * @property string $event_end_date
 * @property integer $event_type
 * @property string $event_url
 * @property integer $event_all_day
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property integer $is_status
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Events extends \yii\db\ActiveRecord
{
     public function behaviors() {
        return [
            BlameableBehavior::className(),
            TimestampBehavior::className()
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%events}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_title', 'event_detail', 'event_start_date', 'event_end_date', 'event_type', 'created_at', 'created_by'], 'required'],
            [['event_start_date', 'event_end_date'], 'safe'],
            [['event_type', 'event_all_day', 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_status'], 'integer'],
            [['event_title'], 'string', 'max' => 80],
            [['event_detail', 'event_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_id' => Yii::t('app', 'Event ID'),
            'event_title' => Yii::t('app', 'Event Title'),
            'event_detail' => Yii::t('app', 'Event Detail'),
            'event_start_date' => Yii::t('app', 'Event Start Date'),
            'event_end_date' => Yii::t('app', 'Event End Date'),
            'event_type' => Yii::t('app', 'Event Type'),
            'event_url' => Yii::t('app', 'Event Url'),
            'event_all_day' => Yii::t('app', 'Event All Day'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_status' => Yii::t('app', 'Is Status'),
        ];
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @inheritdoc
     * @return EventsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EventsQuery(get_called_class());
    }
}
