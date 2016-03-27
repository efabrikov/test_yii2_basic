<?php
namespace app\modules\frontend\modules\block_1458162252\components;

use yii\base\Widget;
use yii\helpers\Html;

class BaseWidget extends Widget
{
    public $message;
    public $outlet_1;


    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'echo Yii::t("app", "msg_default_message");';
        }
        if ($this->outlet_1 === null) {
            $this->outlet_1 = 'echo Yii::t("app", "msg_default_outlet_1");';
        }
    }

    public function run()
    {
        return $this->render('base', [
            'message' => $this->message,
            'outlet_1' => $this->outlet_1
        ]);
    }
}