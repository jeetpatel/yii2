<?php

namespace backend\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "organization".
 *
 * @property integer $id
 * @property string $name
 * @property integer $firm_id
 * @property integer $status_id
 * @property string $contract_start
 * @property string $contract_end
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property OrganizationStatus $status
 * @property Firm $firm
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'firm_id', 'status_id', 'contract_start', 'contract_end'], 'required'],
            [['firm_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['contract_start', 'contract_end'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'firm_id' => Yii::t('app', 'Firm ID'),
            'status_id' => Yii::t('app', 'Status ID'),
            'contract_start' => Yii::t('app', 'Contract Start'),
            'contract_end' => Yii::t('app', 'Contract End'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(OrganizationStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirm()
    {
        return $this->hasOne(Firm::className(), ['id' => 'firm_id']);
    }
    
    static function getOrganizationList($arr=null) {
      $query = new Query;
      $query = $query->select('firm.firm_name,org_status.status_name,org.*')
          ->from(self::tableName().' org')
          ->join('INNER JOIN', 'firm','firm.id=org.firm_id')
          ->join('INNER JOIN', 'organization_status org_status','org_status.id=org.status_id')
          ->orderBy(['org.id'=>'desc']);
        if (!empty($arr))
        {
          $query = $query->where($arr);
        }
      
          $args['limit'] = (!empty($args['limit'])) ? $args['limit'] : LIMIT;
          $query = $query->limit($args['limit']);
          
          if (!empty($args['offset']))
            $query = $query->offset($args['offset']);
          
      // build and execute the query
      $rows = $query->all();
      return $rows;
    }
    
    
}
