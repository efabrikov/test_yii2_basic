<div class="row" style="border: 1px solid green; padding: 5px;">
<?php echo Yii::$app->session['cart']['details'][$key]; ?>
    <a href="/site/cart-item-details-delete?id=<?php echo $key; ?>">close</a>
</div>
