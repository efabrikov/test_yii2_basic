<?php
namespace app\components;
use \Yii;
use yii\base\Component;

class MyClass extends Component
{
    const EVENT_HELLO = 'hello event';

    public $prop1;
    public $prop2;



    public function init()
    {
        parent::init();
        Yii::trace('MyClass init');
        // ... инициализация происходит после того, как была применена конфигурация.
    }

    public function go()
    {
        echo '<br><br><br>go';
        $this->trigger(self::EVENT_HELLO);
    }
}