<?php
namespace app\components\webpage;

use yii\base\Widget;
use yii\helpers\Html;

class Webpage12345Widget extends Widget
{
    public $message;
    public $outlet_1;


    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'msg_default_message';
        }
        if ($this->outlet_1 === null) {
            $this->outlet_1 = 'msg_default_outlet_1';
        }
    }

    public function run()
    {
        return $this->render('webpage12345', [
            'message' => $this->message,
            'outlet_1' => $this->outlet_1
        ]);
    }
}