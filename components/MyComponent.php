<?php
namespace app\components;
use \Yii;
use yii\base\Component;

class MyComponent extends Component
{
    public $prop1;
    public $prop2;

    /*public function __construct($param1, $param2, $config = [])
    {
        // ... инициализация происходит перед тем, как будет применена конфигурация.
        Yii::trace('MyComponent construct');
        parent::__construct($config);
    }*/

    public function init()
    {
        parent::init();
        Yii::trace('MyComponent init');
    }
}