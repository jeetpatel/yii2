<?php

namespace backend\controllers;

use Yii;
use backend\models\Firm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FirmController implements the CRUD actions for Firm model.
 */
class FirmController extends Controller
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
     * Lists all Firm models.
     * @return mixed
     */
    public function actionIndex()
    {
      $model = new Firm();
      $result = $model->getFirmList();
      return $this->render('index', [
          'result' => $result,
      ]);
      
//        $dataProvider = new ActiveDataProvider([
//            'query' => Firm::find(),
//        ]);
//
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);
    }

    /**
     * Displays a single Firm model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      $model = new Firm();
      $result = $model->getFirmList(array('firm.id'=>$id));
      return $this->render('view', [
          'result' => $result,
      ]);
        
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
    }

    /**
     * Creates a new Firm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Firm();

        if (!empty(Yii::$app->request->post()))
        {
          $post = Yii::$app->request->post();
          $post['Firm']['status'] = 1;
          $post['Firm']['created_at'] = time();
          $post['Firm']['updated_at'] = time();
        if ($model->load($post) && $model->save()) {
            Yii::$app->session->setFlash('success','Firm has been created successfully');
            return $this->redirect('index');
        } }
            return $this->render('create', [
                'model' => $model,
            ]);
    }

    /**
     * Updates an existing Firm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
              Yii::$app->session->setFlash('success','Firm has been updated successfully');          
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Firm model.
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
     * Finds the Firm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Firm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Firm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
