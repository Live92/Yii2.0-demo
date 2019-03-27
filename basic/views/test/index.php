<?php
/**
 * Created by PhpStorm.
 * User: dinghongchao@benbang.com
 * Date: 2019/3/25
 * Time: 20:17
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>
<?= nl2br(Html::encode($message)) ?>

<?= nl2br(HtmlPurifier::process($message)) ?>


<?= nl2br('接受到的id是' . Html::encode($id)) ?>
