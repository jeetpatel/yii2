<?php

namespace backend\controllers;

use Yii;
use backend\models\OrganizationStatus;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrganizationStatusController implements the CRUD actions for OrganizationStatus model.
 */
class OrganizationStatusController extends Controller
{
    public function behaviors()
    {
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
     * Lists all OrganizationStatus models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new OrganizationStatus();
        $result = $model->getOrganizationStatusList();
        return $this->render('index', [
            'result' => $result,
        ]);
    }

    /**
     * Displays a single OrganizationStatus model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new OrganizationStatus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      $model = new OrganizationStatus();

        if (!empty(Yii::$app->request->post()))
        {
          $post = Yii::$app->request->post();
          $post['OrganizationStatus']['created_at'] = time();
          $post['OrganizationStatus']['updated_at'] = time();
        if ($model->load($post) && $model->save()) {
            Yii::$app->session->setFlash('success','Organization Status has been created successfully');
            return $this->redirect('index');
        } }
        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing OrganizationStatus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
            return $this->render('update', [
                'model' => $model,
            ]);              
    }

    /**
     * Deletes an existing OrganizationStatus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrganizationStatus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrganizationStatus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrganizationStatus::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
