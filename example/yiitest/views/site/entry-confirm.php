<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 8/22/18
 * Time: 10:46 AM
 */

use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>