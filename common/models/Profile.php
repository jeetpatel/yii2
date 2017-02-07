<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Profile model
 *
 * @property integer $id
 * @property string $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $created_at
 * @property string $updated_at
 */
class Profile extends ActiveRecord {

  const STATUS_DELETED = 0;
  const STATUS_ACTIVE = 10;

  /**
   * @inheritdoc
   */
  public static function tableName() {
    return '{{%profile}}';
  }

  /**
   * @inheritdoc
   */
  public function behaviors() {
    return [
      TimestampBehavior::className(),
    ];
  }

  /**
   * @inheritdoc
   */
  public function rules() {
    return [];
  }

  /**
   * @inheritdoc
   */
  public static function findIdentity($id) {
    return static::findOne(['id' => $id]);
  }

  /**
   * @inheritdoc
   */
  public static function findByUserId($user_id) {
    return static::findOne(['id' => $user_id]);
  }

  /**
   * @inheritdoc
   */
  public function getId() {
    return $this->getPrimaryKey();
  }

  /**
   * @inheritdoc
   */
  public function getUserId() {
    return $this->user_id;
  }

  /**
   *
   * @param string $user_id
   */
  public function setUserId($user_id) {
    $this->user_id = $user_id;
  }

  /**
   * @inheritdoc
   */
  public function getFirstName() {
    return $this->first_name;
  }

  /**
   *
   * @param string $first_name
   */
  public function setFirstName($first_name) {
    $this->first_name = $first_name;
  }

  /**
   * @inheritdoc
   */
  public function getLastName() {
    return $this->last_name;
  }

  /**
   *
   * @param string $last_name
   */
  public function setLastName($last_name) {
    $this->last_name = $last_name;
  }

  /**
   * @inheritdoc
   */
  public function getCreatedAt() {
    return $this->created_at;
  }

  /**
   *
   * @param string $created_at
   */
  public function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

  /**
   * @inheritdoc
   */
  public function getUpdatedAt() {
    return $this->updated_at;
  }

  /**
   *
   * @param string $updated_at
   */
  public function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }

}
