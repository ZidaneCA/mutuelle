<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AdminController extends Controller
{
    public $layout = "adminLayout";
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
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
        return $this->render('index');
    }



    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays consult page.
     *
     * @return Response|string
     */
    public function actionConsulter()
    {
        return $this->render('consulter');
    }

    /**
     * Displays savings page.
     *
     * @return string
     */
    public function actionEpargner()
    {
        return $this->render('index.php');
    }


    /**
     * Displays loans page.
     *
     * @return string
     */
    public function actionEmprunter()
    {
        return $this->render('index');
    }


    /**
     * Displays inscription page.
     *
     * @return string
     */
    public function actionInscription()
    {
        return $this->render('index');
    }

      /**
     * Displays inscription page.
     *
     * @return string
     */
    public function actionFondsociale()
    {
        return $this->render('index');
    }


    /**
     * Displays parameters
     * @return string
     */
    public function actionParametres()
    {
        return $this->render('index');
    }


    /**
     * Displays payment page.
     *
     * @return string
     */
    public function actionRembourser()
    {
        return $this->render('index');
    }
}
