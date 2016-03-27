<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\frontend\modules\block_1458162252\models\Base */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Base',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="base-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
