<?php

namespace backend\models;
use yii\db\Query;
use Yii;

/**
 * This is the model class for table "firm_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class FirmType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'firm_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    static function getFirmTypeList($arr=null) {
      $query = new Query;
      
      $query = $query->select('f.*')
          ->from(self::tableName().' f')
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
