<?php

namespace backend\controllers;

use Yii;
use backend\models\Organization;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Firm;
use backend\models\OrganizationStatus;

/**
 * OrganizationController implements the CRUD actions for Organization model.
 */
class OrganizationController extends Controller {

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
   * Lists all Organization models.
   * @return mixed
   */
  public function actionIndex() {
    $result = Organization::getOrganizationList();
    return $this->render('index', [
          'result' => $result,
    ]);
  }

  /**
   * Displays a single Organization model.
   * @param integer $id
   * @return mixed
   */
  public function actionView($id) {
    
    $result = Organization::getOrganizationList(['org.id'=>$id]);
    return $this->render('view', [
          'model' => (isset($result[0])) ? $result[0] : null,
    ]);
//    return $this->render('view', [
//          'model' => $this->findModel($id),
//    ]);
  }

  /**
   * Creates a new Organization model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate() {
    $model = new Organization();
    if (!empty(Yii::$app->request->post())) {
      $post = Yii::$app->request->post();
      $post['Organization']['status'] = 1;
      $post['Organization']['created_at'] = time();
      $post['Organization']['updated_at'] = time();
//      $post['Organization']['contract_start'] = date('Y-m-d');
//      $post['Organization']['contract_end'] = time();
      
      if ($model->load($post) && $model->save()) {
        Yii::$app->session->setFlash('success', 'Organization has been created successfully');
        return $this->redirect('index');
      }
    }

    $firmTypeResult = Firm::getFirmList();
    $orgStatusResult = OrganizationStatus::getOrganizationStatusList();
    return $this->render('create', [
          'model' => $model, 'firmTypes' => $firmTypeResult,
          'orgResult' => $orgStatusResult
    ]);
  }

  /**
   * Updates an existing Organization model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   */
  public function actionUpdate($id) {
    $model = $this->findModel($id);


    if (Yii::$app->request->post())
    {
      $post = Yii::$app->request->post();
      $post['OrganizationStatus']['updated_at'] = time();          
      if ($model->load($post) && $model->save()) {
          Yii::$app->session->setFlash('success','Organization Status has been updated successfully');
          return $this->redirect('index');
      }          
    }
    
    $firmTypeResult = Firm::getFirmList();
    $orgStatusResult = OrganizationStatus::getOrganizationStatusList();
    return $this->render('update', [
      'model' => $model, 'firmTypes' => $firmTypeResult,
      'orgResult' => $orgStatusResult
    ]); 
            
            
    
  }

  /**
   * Deletes an existing Organization model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   */
  public function actionDelete($id) {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the Organization model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Organization the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id) {
    if (($model = Organization::findOne($id)) !== null) {
      return $model;
    }
    else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }

}
