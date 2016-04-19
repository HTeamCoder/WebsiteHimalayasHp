<?php
namespace frontend\controllers;

use Yii;
use common\models\loaihang;
use common\models\hanghoa;
use common\models\slide;
use common\models\hinhanhslide;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
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
     * @return mixed
     */
    public function actionIndex()
    {
        $hanghoa = new hanghoa();
        $hanghoamoi = $hanghoa->find()->orderBy('id DESC')->limit(8)->all();
        $hanghoanoibat = $hanghoa->find()->orderBy('soluong DESC')->limit(8)->all();
        $hanghoabanchay = $hanghoa->find()->orderBy('soluong ASC')->limit(8)->all();
        $hanghoadexuat = $hanghoa->find()->where('giacanhtranh > 100000')->limit(8)->all();
        $slide = new slide();
        $danhsachslide = $slide->find()->where(['trangthai'=>'kichhoat'])->orderBy('id DESC')->one();
        return $this->render('index',['slide'=>$danhsachslide,'hanghoamois'=>$hanghoamoi,'hanghoanoibats'=>$hanghoanoibat,'hanghoabanchays'=>$hanghoabanchay,'hanghoadexuats'=>$hanghoadexuat]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
}
