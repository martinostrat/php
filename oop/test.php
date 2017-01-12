<?php

require_once 'text.php';

$sentence1 = new text();

echo '<pre>';
print_r($sentence1);
echo '</pre>';

$sentence1->setText('Tere VS16!');

echo '<pre>';
print_r($sentence1);
echo '</pre>';

$sentence1->show();
echo '<hr/>';


$sentence2 = new text('Tere koos konstruktoriga');

echo '<pre>';
print_r($sentence2);
echo '</pre>';

$sentence2->show();
echo '<hr/>';

?>