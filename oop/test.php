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
?>