<?php

namespace backend\controllers;

use Yii;
use backend\models\FirmType;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FirmTypeController implements the CRUD actions for FirmType model.
 */
class FirmTypeController extends Controller
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
     * Lists all FirmType models.
     * @return mixed
     */
    public function actionIndex()
    {
      //$result = FirmType::findAll(array('status'=>'1'));
      $result = FirmType::find()->all();
//      foreach($result as $res) {
//        
//        echo "<pre>"; print_r($res->getAttribute('name')); echo "</pre>";
//      }
//      //echo "<pre>"; print_r($result); echo "</pre>";
//        $dataProvider = new ActiveDataProvider([
//            'query' => FirmType::find(),
//        ]);
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);
        return $this->render('index', [
            'result' => $result,
        ]);
    }

    /**
     * Displays a single FirmType model.
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
     * Creates a new FirmType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FirmType();
        if (!empty(Yii::$app->request->post()))
        {
          $post = Yii::$app->request->post();
          $post['FirmType']['status'] = 1;
          $post['FirmType']['created_at'] = time();
          $post['FirmType']['updated_at'] = time();
        if ($model->load($post) && $model->save()) {
            Yii::$app->session->setFlash('success','Firm type has been created successfully');
            return $this->redirect('index');
        } }
            return $this->render('create', [
                'model' => $model,
            ]);
        
    }

    /**
     * Updates an existing FirmType model.
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
          $post['FirmType']['updated_at'] = time();          
          if ($model->load($post) && $model->save()) {
              Yii::$app->session->setFlash('success','Firm type has been updated successfully');
              return $this->redirect('index');
          }          
        }
            return $this->render('update', [
                'model' => $model,
            ]);
        
    }

    /**
     * Deletes an existing FirmType model.
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
     * Finds the FirmType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FirmType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FirmType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
