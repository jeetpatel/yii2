<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "partner_status".
 *
 * @property integer $id
 * @property string $status_name
 * @property string $status_description
 * @property integer $created_at
 * @property integer $updated_at
 */
class PartnerStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['status_name'], 'string', 'max' => 50],
            [['status_description'], 'string', 'max' => 255],
            [['status_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status_name' => Yii::t('app', 'Status Name'),
            'status_description' => Yii::t('app', 'Status Description'),
            //'created_at' => Yii::t('app', 'Created At'),
            //'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
