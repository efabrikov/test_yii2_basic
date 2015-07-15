<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use yii\web\View;
use app\components\ActionTimeFilter;
use yii\helpers\Url;
use yii\base\ErrorException;

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
            'time'   => [
                'class' => ActionTimeFilter::className()
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
            'page'    => [
                'class' => 'yii\web\ViewAction',
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login',
                    [
                    'model' => $model,
            ]);
        }
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
        } else {
            return $this->render('contact',
                    [
                    'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionEfabrikov()
    {
        //echo \Yii::$app->view->renderFile('@app/license.md');

        /* \Yii::$app->view->on(View::EVENT_END_BODY,
          function () {
          echo date('Y-m-d') . 'sssssssssssssssssssssssssssssssssss<hr><hr>';
          }); */

        /* $q = new \yii\db\Query();

          print_r($q->from('country')->max('population')); */
        //throw new \yii\web\NotFoundHttpException('No !!!');
        //throw new \yii\web\ServerErrorHttpException('AAAAAA');
        /*$response         = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data   = ['message' => 'hello world'];

        return $response;*/
        //\Yii::$app->response->redirect('http://example.com/new', 301)->send();

        /*\Yii::$app->response
            ->redirect(Url::toRoute('site/table'), 301)
            ->send();*/
        /*return \Yii::$app->response
            ->sendFile(Yii::getAlias('@webroot/img/test-image.jpg'));*/
        //echo '<pre>';
        //Yii::info('ssss');


        //throw new \yii\base\UserException('wtf?');
        //Yii::info(Yii::$app->session);
        /*Yii::info('test', 'category');
        \Yii::beginProfile('block1');
        \Yii::beginProfile('block2');
        \Yii::endProfile('block2');
        \Yii::endProfile('block1');*/

        //$com = new \app\components\MyClass(1,2);
        //echo '<pre>';
        //Yii::$app->myClass->go();
        //var_dump(Yii::$app->myClass);

        //$myObject = Yii::createObject(\app\components\MyObject::className());
        //$myObject = new \app\components\MyObject('param1', 'param2');
        /*$myObject = Yii::createObject([
            'class' => \app\components\MyObject::className()
        ],[1,2]);*/

        /*$myComponent = Yii::createObject([
            'class' => \app\components\MyComponent::className(),
            'prop1' => 1,
            'prop2' => 2,
        ]);*/

        /*$date = new \DateTime();
        print_r($date->getTimezone()); die();*/

        /*$myComponent = Yii::$app->myComponent->prop1;
        echo $myComponent; die();*/


         /*Yii::$app->on('views.site.efabrikov.end',
            ['\app\components\MyObject', 'afterSiteEvent']);*/        

        return $this->render('efabrikov');

    }

    public function actionAuthClientCollection()
    {
        
    }

    public function actionTable()
    {
        //Материал
        //Плотность
        //Коэффициент теплопроводности

        $filename = Yii::getAlias('@webroot/files/data_table_materials.txt');
        $content  = file_get_contents($filename);
        $content  = str_replace(['<tr>', '<td>', '<p>'], '', $content);
        $data     = explode('    ', $content);

        unset($data[0]);
        unset($data[239]);

        $data = array_filter($data,
            function($var) {
            $var = trim($var);
            return (empty($var)) ? false : true;
        });

        $data = array_chunk($data, 3);
        usort($data,
            function($a, $b) {
            if ($a[2] == $b[2]) {
                return 0;
            }
            return ($a[2] < $b[2]) ? -1 : 1;
        }
        );

        //echo'<pre>';
        //print_r($data);
        foreach ($data as $key => $value) {

            echo "<div><span>{$value[0]}</span><span>{$value[1]}</span><span><b>{$value[2]}</b></span></div>";
        }
    }

    public function successCallback($client)
    {
        $attributes = $client->getUserAttributes();
        // user login or signup comes here
        //\yii\helpers\VarDumper::dump($attributes,10, 1);  die();
    }
}