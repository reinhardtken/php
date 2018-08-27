<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 8/27/18
 * Time: 3:22 AM
 */


use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <strong><?= Html::encode($model["id"]) ?></strong>
    <a href="test/index/<?= $model["name"] ?>"><?= HtmlPurifier::process($model["name"]) ?> </a>
    <a href="test/index/<?= $model['email'] ?>"><?= HtmlPurifier::process($model['email']) ?> </a>
</div>