<?php
namespace app\components;
use \Yii;
use yii\base\Object;

class MyObject extends Object
{
    public $prop1;
    public $prop2;

    public function __construct($param1, $param2, $config = [])
    {
        // ... инициализация происходит перед тем, как будет применена конфигурация.
        Yii::trace('MyObject construct');
        parent::__construct($config);
    }

    public function init()
    {
        parent::init();
        Yii::trace('MyObject init');
    }

    public static function afterSiteEvent()
    {
        Yii::trace('MyObject afterSiteEvent');;
    }
}