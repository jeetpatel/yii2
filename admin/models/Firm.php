<?php

namespace backend\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "firm".
 *
 * @property integer $id
 * @property string $firm_name
 * @property integer $firm_type
 * @property integer $is_registered
 * @property string $vat_number
 * @property string $cst_number
 * @property string $gst_number
 * @property string $pan_number
 * @property string $tan_number
 * @property string $service_tax
 * @property string $primary_contact
 * @property string $primary_email
 * @property string $address_1
 * @property string $address_2
 * @property string $district
 * @property string $state
 * @property integer $pin_code
 * @property double $longitude
 * @property double $latitude
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Firm $firmType
 * @property Firm[] $firms
 */
class Firm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'firm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firm_name', 'firm_type', 'primary_contact', 'primary_email', 'address_1', 'district', 'state', 'pin_code'], 'required'],
            [['firm_type', 'is_registered', 'pin_code', 'status', 'created_at', 'updated_at'], 'integer'],
            [['longitude', 'latitude'], 'number'],
            [['firm_name', 'district', 'state'], 'string', 'max' => 50],
            [['vat_number', 'cst_number', 'gst_number', 'pan_number', 'tan_number', 'service_tax'], 'string', 'max' => 20],
            [['primary_contact'], 'string', 'max' => 12],
            [['primary_email', 'address_1', 'address_2'], 'string', 'max' => 255],
            //[['pin_code'], 'integer', 'max' => 6],
            [['firm_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firm_name' => 'Firm Name',
            'firm_type' => 'Firm Type',
            'is_registered' => 'Is Registered',
            'vat_number' => 'Vat Number',
            'cst_number' => 'Cst Number',
            'gst_number' => 'Gst Number',
            'pan_number' => 'Pan Number',
            'tan_number' => 'Tan Number',
            'service_tax' => 'Service Tax',
            'primary_contact' => 'Primary Contact',
            'primary_email' => 'Primary Email',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'district' => 'District',
            'state' => 'State',
            'pin_code' => 'Pin Code',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirmType()
    {
        return $this->hasOne(Firm::className(), ['id' => 'firm_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirms()
    {
        return $this->hasMany(Firm::className(), ['firm_type' => 'id']);
    }
    
    function getFirmList($arr=null) {
      $query = new Query;
      $query = $query->select('firm_type.name,firm_type.description,firm.*')
          ->from('firm')
          ->join('INNER JOIN', 'firm_type','firm_type.id=firm.firm_type')
          ->orderBy(['firm.id'=>'desc']);
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
