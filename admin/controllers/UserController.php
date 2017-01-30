<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\models\User;
use yii\db\Query;

/**
 * User controller
 */
class UserController extends Controller
{
  public $defaultAction = 'index';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','profile','list'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
      $this->layout = 'login';
      if (!\Yii::$app->user->isGuest) {
          return $this->goHome();
      }

      $model = new LoginForm();
      if ($model->load(Yii::$app->request->post()) && $model->login()) {
          return $this->goBack();
      } else {
          return $this->render('login', [
              'model' => $model,
          ]);
      }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    
    public function actionProfile()
    {
        return $this->render('profile');
    }
    
    public function actionList()
    {
      $user = new User();
      $result = $user->listUsers();
      //echo "<pre>"; print_r($result); echo "</pre>";
      //$result = User::fetchAll();
      return $this->render('list',['result'=>$result]);
    }
    
}
