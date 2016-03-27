<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\cmenu\ContextMenu;

$this->title                   = 'Cart';
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag(['mk' => 'mv']);
//add_header("X-PJAX-Container: #cart");
?>
<div class="site-about" style="background-color: white; padding: 20px;">
    <?php
    yii\widgets\Pjax::begin([
        'id'              => 'cart',
        'enablePushState' => false,
        'options'         => [
            'tag' => 'span'
        ]
    ])
    ?>
    <?php
    //TODO: move thist and js to pjax widget. or delete :)
    if (Yii::$app->request->isPjax) {
        // echo '<script>window.pjax_reload_list["cart"] = [];</script>';
        //echo '<script>window.pjax_reload_list["cart"].push("clock");</script>';
        echo '<script> $.pjax.reload({container:"#clock"});</script>';
    }
    ?>


    <?php
    ContextMenu::begin([
        'items' => [
            ['label' => 'Edit', 'url' => '#'],
            ['label' => 'Settings', 'url' => '#'],
            ['label' => 'Delete', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => 'Separated link', 'url' => '#'],
        ],
    ]);
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php ContextMenu::end(); ?>

    <p>
        <a href="/site/add-cart-item?pid=132">
            <?php echo Yii::t('app', 'Add product #pid') . '132'; ?>
        </a>
        <br>
        <a href="/site/add-cart-item?pid=142">
            <?php echo Yii::t('app', 'Add product #pid') . '142'; ?>
        </a>
        <br>
        <a href="/site/add-cart-item?pid=155">
            <?php echo Yii::t('app', 'Add product #pid') . '155'; ?>
        </a>

        <?= Html::beginForm(['/site/cart'], 'post', ['data-pjax' => '1', 'style' => 'display: inline;']); ?>
        <input hidden="" name="pid" value="155">
        <?= Html::submitButton('add 155', ['name' => 'do[add]']); ?>
        <?= Html::endForm(); ?>
    </p>

    <hr>

    <p>
        <?php echo Yii::t('app', 'Cart id #') . $cart['id']; ?>
    </p>

    <code>
        <p>            
            <?php
            if (!empty($cart['items'])) {
                echo Yii::t('app', 'Items:');
                echo '<ul>';
                foreach ($cart['items'] as $key => $value) {
                    //echo '<img src="/images/img1.jpg"></img>';
                    echo '<li>[' . $key . '] = ' . $value
                    . ' <a href="/site/delete-cart-item?id=' . $key . '">delete</a> |'
                    . ' <a href="/site/about" data-pjax-reload-id="main">view</a> |'
                    . ' <a href="/site/cart-item-details-add?id=' . $key . '">details</a>'
                    . '</li>';
                    if (!empty(Yii::$app->session['cart']['details'][$key])) {
                        include '_details.php';
                    }
                }
                echo '</ul>';
            } else {
                echo Yii::t('app', 'Cart is empty.');
            }
            ?>

        </p>

    </code>

    <hr>
    <p>
        <?php echo Yii::t('app', 'History'); ?>
    </p>
    <?php echo Yii::t('app', 'Added product #pid') . Yii::$app->request->get('pid'); ?>
    <?= Html::input('text', 'string', Yii::$app->request->get('pid'), ['class' => 'form-control']) ?>

    <?php echo Yii::t('app', 'Deleted item #id') . Yii::$app->request->get('id'); ?>
    <?= Html::input('text', 'string', Yii::$app->request->get('id'), ['class' => 'form-control']) ?>

    <?php Pjax::end(); ?>

    <hr>
    <?php
    yii\widgets\Pjax::begin([
        'id'              => 'clock',
        'enablePushState' => false,
        'options'         => [
            'tag' => 'span'
        ]
    ])
    ?>

    pjax block #clock
    <?php echo date("d-m-Y h:i:s"); ?>
    <?php Pjax::end(); ?>

    <!--input type="text"-->

    <!--iframe width="420" height="315" src="https://www.youtube.com/embed/6zER7-uJQQ8" frameborder="0" allowfullscreen></iframe-->


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

    //$this->renderHeadHtml();
    $lines = [];
    //$lines[] = $this->renderHeadHtml();

    if (!empty($this->jsFiles[$this::POS_HEAD])) {
        $lines[] = implode("\n", $this->jsFiles[$this::POS_HEAD]);
    }

    if (!empty($this->jsFiles[$this::POS_END])) {
        $lines[] = implode("\n", $this->jsFiles[$this::POS_END]);
    }

    $scripts   = [];
    //fix
    $scripts[] = 'console.log("added inlinejs from header");';
    //$scripts[] = '$("#cart a").click(function(e){e.preventDefault(); })';
    //$scripts[] = '$(document).on("click", "#cart a", function(event) { event.stopPropagation(); });';
    //$scripts[] = 'jQuery(document).off("click", "#cart");';
    //$scripts[] = '$("#cart").pjax("a")';
    //$scripts[] = '$("#cart a").click(function(e){e.preventDefault(); })';    
    //$scripts[] = '$("#cart a").off(\'click\');';
    //$scripts[] = '$("#cart a").unbind("click");';
    //this.removeEventListener('click');

    if (!empty($this->js[$this::POS_HEAD])) {
        $scripts[] = implode("\n", $this->js[$this::POS_HEAD]);
    }

    if (!empty($this->js[$this::POS_END])) {
        $scripts[] = implode("\n", $this->js[$this::POS_END]);
    }
    if (!empty($this->js[$this::POS_READY])) {
        $scripts[] = implode("\n", $this->js[$this::POS_READY]);
    }
    if (!empty($this->js[$this::POS_LOAD])) {
        $scripts[] = implode("\n", $this->js[$this::POS_LOAD]);
    }

    //$scripts[] = '$("#cart a").click(function(event){event.stopPropagation();});';    

    if (!empty($scripts)) {
        Yii::$app->session['inlineJs'] = 'jQuery(document).ready(function () {'
            . implode("\n", $scripts) . '});';

        $lines[] = '<script src="/site/inline-js?q=' . mktime() . '"></script>';
        //echo '<script>console.log("inline run");</script>';
    }

    echo empty($lines) ? '' : implode("\n", $lines);
}
?>