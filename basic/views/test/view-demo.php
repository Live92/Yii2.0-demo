<?php
/**
 * Created by PhpStorm.
 * User: dinghongchao@benbang.com
 * Date: 2019/3/28
 * Time: 14:40
 */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;


// 转义html、js、 html::encode()
// 屏蔽html、js、 HtmlPurifier::process()

?>

<?= html::encode($data['a'])?>
<?= HtmlPurifier::process($data['a'])?>
