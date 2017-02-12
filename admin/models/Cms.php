<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cms".
 *
 * @property integer $id
 * @property integer $firm_id
 * @property string $page_title
 * @property string $page_body
 * @property integer $status
 *
 * @property Firm $firm
 */
class Cms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firm_id', 'page_title', 'page_body', 'status'], 'required'],
            [['firm_id', 'status'], 'integer'],
            [['page_body'], 'string'],
            [['page_title'], 'string', 'max' => 255]
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
            'page_title' => Yii::t('app', 'Page Title'),
            'page_body' => Yii::t('app', 'Page Body'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirm()
    {
        return $this->hasOne(Firm::className(), ['id' => 'firm_id']);
    }
    
    public function relations(){
      return array(
          'firms' => array(self::HAS_MANY, 'Firm', 'firm_name'),
      );
    }
}
