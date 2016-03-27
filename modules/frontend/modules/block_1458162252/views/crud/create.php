<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\frontend\modules\block_1458162252\models\Base */

$this->title = Yii::t('app', 'Create Base');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="base-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
