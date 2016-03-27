<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Pjax;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!--script> window.pjax_reload_list = []; </script-->
    </head>

    <body>
        <?php require_once '_body-bg.php' ?>

        <?php $this->beginBody() ?>

        <?php
        yii\widgets\Pjax::begin([
            'id'      => 'main',
            'options' => [
                'tag' => 'span'
            ]
        ])
        ?>      



        <div class="wrap">

            <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl'   => Yii::$app->homeUrl,
                'options'    => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items'   => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    ['label' => 'Cart', 'url' => ['/site/cart']],
                    Yii::$app->user->isGuest ? (
                        ['label' => 'Login', 'url' => ['/site/login']]
                        ) : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['data-pjax' => '1'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link']
                        )
                        . Html::endForm()
                        . '</li>'
                        )
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs']
                            : [],
                ])
                ?>
                <?= $content ?>
            </div>

        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>


        <?php Pjax::end(); ?>
        <?php $this->endBody(); ?>
        <?php Yii::$app->session['jsFiles'] = $this->jsFiles; ?>

        <?php require_once '_loader.php' ?>

    </body>
</html>
<?php $this->endPage() ?>
