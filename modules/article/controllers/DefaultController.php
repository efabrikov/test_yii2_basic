<?php

namespace app\modules\article\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        //from db webpage_id
        $webpageId = '12345';

        return $this->render('@app/modules/webpage/views/default/webpage' . $webpageId, [
            'message' => 'message from webpage',
            'outlet_1' => 'outlet_1 from webpage'
            ] );
        //return $this->render('index');
    }
}
