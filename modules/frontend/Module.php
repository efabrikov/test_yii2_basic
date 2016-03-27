<?php

namespace app\modules\frontend;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\frontend\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->modules = [
            'fm_1458135584'    => [
                // здесь имеет смысл использовать более лаконичное пространство имен
                'class' => 'app\modules\frontend\modules\fm_1458135584\Module',
            ],
            'block_1458162252' => [
                'class' => 'app\modules\frontend\modules\block_1458162252\Module',
            ],
        ];
    }
}
