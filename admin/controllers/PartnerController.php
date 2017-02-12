<?php

namespace backend\controllers;

use Yii;
use backend\models\Partner;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Firm;
use backend\models\Organization;
use backend\models\PartnerStatus;

/**
 * PartnerController implements the CRUD actions for Partner model.
 */
class PartnerController extends Controller {

  public function behaviors() {
    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['post'],
        ],
      ],
    ];
  }

  /**
   * Lists all Partner models.
   * @return mixed
   */
  public function actionIndex() {
    $dataProvider = new ActiveDataProvider([
      'query' => Partner::find(),
    ]);

    return $this->render('index', [
          'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single Partner model.
   * @param integer $id
   * @return mixed
   */
  public function actionView($id) {
    return $this->render('view', [
          'model' => $this->findModel($id),
    ]);
  }

  /**
   * Creates a new Partner model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate() {
    $model = new Partner();
    
    $firmResult = Firm::findAll(['status'=>1]);
    $orgResult = Organization::find()->all();
    $pStatusResult = PartnerStatus::find()->all();
    
    if (!empty(Yii::$app->request->post())) {
      $post = Yii::$app->request->post();
      $post['Partner']['created_at'] = time();
      $post['Partner']['updated_at'] = time();
      if ($model->load($post) && $model->save()) {
        Yii::$app->session->setFlash('success', 'Partner has been created successfully');
        return $this->redirect('index');
      }
    }
    return $this->render('create', [
          'model' => $model,'firmResult'=>$firmResult,'orgResult'=>$orgResult,
          'pStatusResult'=>$pStatusResult
    ]);
  }

  /**
   * Updates an existing Partner model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   */
  public function actionUpdate($id) {
    $model = $this->findModel($id);
    $firmResult = Firm::findAll(['status'=>1]);
    $orgResult = Organization::find()->all();
    $pStatusResult = PartnerStatus::find()->all();
    
    if (!empty(Yii::$app->request->post())) {
      $post = Yii::$app->request->post();
      $post['Partner']['updated_at'] = time();
      if ($model->load($post) && $model->save()) {
        Yii::$app->session->setFlash('success', 'Partner has been updated successfully');
        return $this->redirect('index');
      }
    }
    return $this->render('update', [
          'model' => $model,'firmResult'=>$firmResult,'orgResult'=>$orgResult,
          'pStatusResult'=>$pStatusResult
    ]);
  }

  /**
   * Deletes an existing Partner model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   */
  public function actionDelete($id) {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the Partner model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Partner the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id) {
    if (($model = Partner::findOne($id)) !== null) {
      return $model;
    }
    else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }

}
