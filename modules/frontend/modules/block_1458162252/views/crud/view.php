<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\frontend\modules\block_1458162252\models\Base */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="base-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php /*echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'message',
            'outlet_1',
        ],
    ])*/ ?>
</div>
<hr>
<?php echo  app\modules\frontend\modules\block_1458162252\components\BaseWidget::widget([    'message' => $model->message, 'outlet_1' => $model->outlet_1     ]); ?>
