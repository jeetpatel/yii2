<?php

namespace backend\models;
use yii\db\Query;
use Yii;

/**
 * This is the model class for table "organization_status".
 *
 * @property integer $id
 * @property string $status_name
 * @property string $status_description
 */
class OrganizationStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_name'], 'required'],
            [['status_name'], 'string', 'max' => 50],
            [['created_at', 'updated_at','status'], 'integer'],
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
            'id' => 'ID',
            'status_name' => 'Status Name',
            'status_description' => 'Status Description',
            'created_at' => 'Created',
            'updated_at' => 'Updated',
        ];
    }
    
    static function getOrganizationStatusList($arr=null) {
      $query = new Query;
      
      $query = $query->select('orgs.*')
          ->from(self::tableName().' orgs')
          ->orderBy(['id'=>'desc']);
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
