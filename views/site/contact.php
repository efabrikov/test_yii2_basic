<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form', 'options' => ['data-pjax' => '1']]); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>

<?php
if (Yii::$app->request->isPjax) {
    if (Yii::$app->session['jsFiles']) {
        foreach (Yii::$app->session['jsFiles'] as $value) {
            foreach ($value as $key => $value) {
                $prevJsFiles[] = $key;
            }
        }
    }

    foreach (array_keys($this->assetBundles) as $bundle) {
        $this->registerAssetFiles($bundle);
    }
    
    $lines = [];

    if (!empty($this->jsFiles[$this::POS_END])) {
        $lines[] = implode("\n", $this->jsFiles[$this::POS_END]);
    }

    $scripts = [];
    if (!empty($this->js[$this::POS_END])) {
        $scripts[] = implode("\n", $this->js[$this::POS_END]);
    }
    if (!empty($this->js[$this::POS_READY])) {
        $scripts[] = implode("\n", $this->js[$this::POS_READY]);
    }
    if (!empty($this->js[$this::POS_LOAD])) {
        $scripts[] = implode("\n", $this->js[$this::POS_LOAD]);
    }
    if (!empty($scripts)) {
        Yii::$app->session['inlineJs'] = implode("\n", $scripts);

        $lines[] = '<script src="/site/inline-js?q='.  mktime() . '"></script>';
    }

    echo empty($lines) ? '' : implode("\n", $lines);
    
}
?>
