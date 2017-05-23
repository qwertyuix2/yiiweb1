<?php
use yii\helpers\Html;

echo 'ok test1';
echo '<hr>';

echo Html::a(
        '<i class="glyphicon glyphicon-play"></i> go to test2 -->',
        ['/pcc/test/test2','id'=>1,'name'=>'yui'],
        ['class'=>'btn btn-success']
        );
