<?php

namespace app\modules\webpage;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\webpage\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->modules = [
            'block1234' => [
                // здесь имеет смысл использовать более лаконичное пространство имен
                'class' => 'app\modules\webpage\modules\block1234\Module',
            ]
        ];
    }
}