<?php

namespace app\modules\externalapi\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;
use \yii\helpers\VarDumper;

/**
 * VkontakteController implements the external api
 */
class GoogleController extends Controller
{
    private $_client = null;

    public function beforeAction($action)
    {
        parent::beforeAction($action);

        $this->_client = Yii::$app->authClientCollection->getClient('google');

        return true;
    }

    public function actionIndex()
    {
        $links = [
            'index'                            => Url::toRoute('index'),
            'getUserAttributes'                => Url::toRoute('api1'),
            'people/103670338149146743472 GET' => Url::toRoute('api2')
        ];

        return $this->render('index', ['links' => $links]);
    }

    public function actionApi1()
    {
        try {
            $attr = $this->_client->getUserAttributes();
        } catch (\Exception $exc) {
            Yii::$app->response->data = $exc->getMessage();
            return Yii::$app->response;
        }

        Yii::$app->response->data = VarDumper::dumpAsString($attr, 11, 1);
        return Yii::$app->response;
    }

    public function actionApi2()
    {
        try {
            $data = $this->_client->api('people/103670338149146743472', 'GET');
        } catch (\Exception $exc) {
            Yii::$app->response->data = $exc->getMessage();
            return Yii::$app->response;
        }

        Yii::$app->response->data = VarDumper::dumpAsString($data, 11, 1);
        return Yii::$app->response;
    }
}