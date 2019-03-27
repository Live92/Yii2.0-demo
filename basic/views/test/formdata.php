<?php
/**
 * Created by PhpStorm.
 * User: dinghongchao@benbang.com
 * Date: 2019/3/27
 * Time: 17:59
 */
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
<li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>
