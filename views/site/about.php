<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title                   = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>

</div>

<?php
//echo app\modules\frontend\modules\fm_1458135584\components\HelloWidget::widget(['message' => 'Good morning']);

/*echo call_user_func_array(
    [
    'app\modules\frontend\modules\block_1458162252\components\BaseWidget',
    'widget'
    ], [
    [
        'message' => 'Message 1',
        'outlet_1' => call_user_func_array(
            [
            'app\modules\frontend\modules\block_1458162252\components\BaseWidget',
            'widget'
            ], [
            [
                'message' => 'Message 2'
            ]
            ]
        )
    ]
    ]
);*/

//eval('$arr = ["aaa"=>"222"];');
//print_r($arr);
//call_user_func_array("");
//eval('echo app\modules\frontend\modules\fm_1458135584\components\HelloWidget::widget([\'message\' => \'Good morning\']);');
//echo app\components\webpage\Webpage12345Widget::widget();



?>