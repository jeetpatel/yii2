<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property integer $firm_id
 * @property integer $organization_id
 * @property integer $partner_status_id
 * @property string $contract_start
 * @property string $contract_end
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property PartnerStatus $partnerStatus
 * @property Firm $firm
 * @property Organization $organization
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firm_id', 'organization_id', 'partner_status_id'], 'required'],
            [['firm_id', 'organization_id', 'partner_status_id', 'created_at', 'updated_at'], 'integer'],
            [['contract_start', 'contract_end'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firm_id' => Yii::t('app', 'Firm ID'),
            'organization_id' => Yii::t('app', 'Organization ID'),
            'partner_status_id' => Yii::t('app', 'Partner Status ID'),
            'contract_start' => Yii::t('app', 'Contract Start'),
            'contract_end' => Yii::t('app', 'Contract End'),
            //'created_at' => Yii::t('app', 'Created At'),
            //'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartnerStatus()
    {
        return $this->hasOne(PartnerStatus::className(), ['id' => 'partner_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirm()
    {
        return $this->hasOne(Firm::className(), ['id' => 'firm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization_id']);
    }
    public function relations(){
      return array(
          'firms' => array(self::HAS_MANY, 'Firm', 'firm_name'),
          'org' => array(self::HAS_MANY, 'Organization', 'name'),
          'p_status' => array(self::HAS_MANY, 'PartnerStatus', 'status_name'),
      );
    }
}
