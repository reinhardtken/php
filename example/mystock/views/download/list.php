<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 8/27/18
 * Time: 3:15 AM
 */



use yii\helpers\Html;
use yii\widgets\ListView;

//$this->title = '朝代';
//$this->params['breadcrumbs'][] = $this->title;
?>
<!--    <h1>朝代</h1>-->
<!--    <ul>-->
<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',//子视图
]);
?>