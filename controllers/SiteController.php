<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;
use yii2fullcalendar\yii2fullcalendar;
use app\models\Contacts;
use app\models\ContactsSearch;
use app\models\Lists;
use app\models\ListsSearch;
use yii\data\ArrayDataProvider;
// use app\controllers\ListsController;

class SiteController extends MainController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
            'access' => [
                'class' => AccessControl::ClassName(),
                'only' => ['logout', 'signup', 'index'],
                'rules' => [
                    [
                        'actions' => ['signup', 'index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        
        $searchModel = new ListsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // if (!Yii::$app->user->isGuest) {
     
        //     $dataProvider->query->andwhere("dep_code='" . Yii::$app->user->identity->dep_code . "'");
        // } 


        return $this->render('//lists/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

        
        // $sql = null;

        // if (!Yii::$app->user->isGuest) {
        //     $sql = Yii::$app->db->createCommand("SELECT c.fullname,
        // c.position,
        // c.department,
        // c.email,
        // c.tel,
        // c.fax,
        // c.tel_moi,
        // c.mobile_fix,
        // c.mobile_phone,
        // c.image,
        // d.department 
        // FROM contacts as c 
        // INNER JOIN department as d ON(c.department=d.dep_id) 
        // WHERE c.department='" . Yii::$app->user->identity->dep_code . "'
        // ");
        //     $data = $sql->queryAll();
        // } else {
        //     $sql = Yii::$app->db->createCommand("SELECT c.* FROM contacts as c ");
        //     $data = $sql->queryAll();
        // }

        // $searchModel = new ContactsSearch();
        // $dataProvider = new ArrayDataProvider([
        //     'allModels' => $data,

        // ]);

        // return $this->render(
        //     '//contacts/index',
           
        //     [
        //         'dataProvider' => $dataProvider,
        //         'searchModel' => $searchModel,
        //     ]
        // );

        // $searchModel = new ContactsSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('//contacts/index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
    }



    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
            // return $this->render('about');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
