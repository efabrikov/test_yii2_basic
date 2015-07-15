<?php
use yii\helpers\Html;

foreach ($links as $label => $url) {
    echo '<div class="well">' . Html::a($label, $url) . '</div>';
}