<?php
use yii\helpers\Html;
use kartik\grid\GridView;


echo 'this is test2';
//echo $a;
echo '<hr>';
echo Html::a(
        '<-- go to test1',
        ['/pcc/test/test1']
        );

echo Html::a(
        ' go google -->',
        'http://google.com',
        ['target'=>'_black']
        );
echo '<hr>';

echo GridView::widget([
   'dataProvider'=>$dataProvider
]);