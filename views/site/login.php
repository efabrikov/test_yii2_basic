<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal', 'data-pjax' => '1'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'value' => 'demo']) ?>

        <?= $form->field($model, 'password')->passwordInput(['value' => 'demo']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>

<?php
if (Yii::$app->request->isPjax) {
    foreach (Yii::$app->session['jsFiles'] as $value) {
        foreach ($value as $key => $value) {
            $prevJsFiles[] = $key;
        }
    }

    foreach (array_keys($this->assetBundles) as $bundle) {
        $this->registerAssetFiles($bundle);
    }

    if (!empty($this->jsFiles)) {
        foreach ($this->jsFiles as $key => $value) {
            if (!empty($value)) {
                foreach ($value as $key2 => $value2) {
                    if (in_array($key2, $prevJsFiles)) {
                        continue;
                    }

                    echo '<script>';
                    echo require_once Yii::getAlias('@webroot') . $key2;
                    echo '</script>';
                }
            }
        }
    }

    echo $this->renderBodyEndHtml(true);
}
?>
