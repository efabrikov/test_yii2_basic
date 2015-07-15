<?php
namespace app\components;
use \Yii;
use yii\base\Component;

class MyEventComponent extends Component
{
    const EVENT_HELLO = 'hello event';
    
    public $prop1;
    public $prop2;

    public function init()
    {
        parent::init();
        Yii::trace('MyEventComponent init');

        Yii::$app->on('views.site.efabrikov.end', function($event) {
            Yii::trace('views.site.efabrikov.end in MyEventComponent');
        });

    }

    public function go()
    {
        Yii::trace('MyEventComponent go');
        $this->trigger(self::EVENT_HELLO);
    }
}