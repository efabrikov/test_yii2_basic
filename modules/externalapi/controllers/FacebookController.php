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
class FacebookController extends Controller
{
    private $_client = null;

    public function beforeAction($action)
    {
        parent::beforeAction($action);

        $this->_client = Yii::$app->authClientCollection->getClient('facebook');

        return true;
    }

    public function actionIndex()
    {
        $links = [
            'index'             => Url::toRoute('index'),
            'getUserAttributes' => Url::toRoute('api1'),
            '/v2.3/me'          => Url::toRoute('api2')
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
            $data = $this->_client->api('/v2.3/me');
        } catch (\Exception $exc) {
            Yii::$app->response->data = $exc->getMessage();
            return Yii::$app->response;
        }

        Yii::$app->response->data = VarDumper::dumpAsString($data, 11, 1);
        return Yii::$app->response;
    }
}