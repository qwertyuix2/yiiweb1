<?php


use yii\helpers\ArrayHelper;

$array = [];
$array[] = 'you';
$array['y'] = 'me';
$array['x'] = date('Y-m-d H:i:s');

$array2 = ['a','b'];

$all = ArrayHelper::merge($array,$array2);

echo "<hr>";
echo "<pre>";
print_r($array);
echo "</pre>";

