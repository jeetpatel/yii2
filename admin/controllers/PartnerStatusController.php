<?php

namespace backend\controllers;

use Yii;
use backend\models\PartnerStatus;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PartnerStatusController implements the CRUD actions for PartnerStatus model.
 */
class PartnerStatusController extends Controller
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
     * Lists all PartnerStatus models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PartnerStatus::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PartnerStatus model.
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
     * Creates a new PartnerStatus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PartnerStatus();
        if (!empty(Yii::$app->request->post()))
        {
          $post = Yii::$app->request->post();
          $post['PartnerStatus']['created_at'] = time();
          $post['PartnerStatus']['updated_at'] = time();
        if ($model->load($post) && $model->save()) {
            Yii::$app->session->setFlash('success','Partner Status has been created successfully');
            return $this->redirect('index');
        } }
        
            return $this->render('create', [
                'model' => $model,
            ]);
        
    }

    /**
     * Updates an existing PartnerStatus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);        
        if (!empty(Yii::$app->request->post()))
        {
          $post = Yii::$app->request->post();
          $post['PartnerStatus']['updated_at'] = time();
        if ($model->load($post) && $model->save()) {
            Yii::$app->session->setFlash('success','Partner Status has been updated successfully');
            return $this->redirect('index');
        } }
        
            return $this->render('update', [
                'model' => $model,
            ]);
        
    }

    /**
     * Deletes an existing PartnerStatus model.
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
     * Finds the PartnerStatus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PartnerStatus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PartnerStatus::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
