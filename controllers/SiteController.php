<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCart()
    {
        if (Yii::$app->request->isPjax) {
            if (isset($_POST['do']) && is_array($_POST['do']) && count($_POST['do'])
                == 1) {
                reset($_POST['do']);
                $k = key($_POST['do']);
                if ($k == "add") {
                    echo "Добавление" . $_POST['pid'];
                    if (empty(Yii::$app->session['cart'])) return;

                    $cart                      = Yii::$app->session['cart'];
                    $cart['items'][]           = $_POST['pid'];
                    Yii::$app->session['cart'] = $cart;
                }
                elseif ($k == "del") echo "Удаление";
                else echo "Так не бывает";
            } else echo "Так не бывает";
        }

        if (!empty(Yii::$app->session['cart'])) {
            $cart = Yii::$app->session['cart'];
        } else {
            $cart = [
                'id'    => array_sum(explode(' ', microtime())) * 10000,
                'items' => []
            ];
        }

        Yii::$app->session['cart'] = $cart;

        return $this->render('cart', [
                'cart' => $cart
        ]);
    }

    public function actionAddCartItem($pid)
    {
        if (empty(Yii::$app->session['cart'])) return;

        $cart                      = Yii::$app->session['cart'];
        $cart['items'][]           = $pid;
        Yii::$app->session['cart'] = $cart;

        return $this->redirect('/site/cart');
    }

    public function actionDeleteCartItem($id)
    {
        if (empty(Yii::$app->session['cart'])) return;

        $cart                      = Yii::$app->session['cart'];
        unset($cart['items'][$id]);
        Yii::$app->session['cart'] = $cart;

        return $this->redirect('/site/cart');
    }

    public function actionCartItemDetailsAdd($id)
    {
        if (empty(Yii::$app->session['cart'])) return;

        $cart                      = Yii::$app->session['cart'];
        $cart['details'][$id]      = 'some data from db. cache in session. #=' . $id;
        Yii::$app->session['cart'] = $cart;

        return $this->redirect('/site/cart');
    }

    public function actionCartItemDetailsDelete($id)
    {
        if (empty(Yii::$app->session['cart'])) return;

        $cart                      = Yii::$app->session['cart'];
        unset($cart['details'][$id]);
        Yii::$app->session['cart'] = $cart;

        return $this->redirect('/site/cart');
    }

    public function actionInlineJs()
    {
        header("Content-type: text/javascript");

        Yii::$app->response->data   = Yii::$app->session['inlineJs'];
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;

        return Yii::$app->response;
    }
}