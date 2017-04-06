<?php

require_once 'text.php';
require_once 'ctext.php';

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


$sentence3 = new ctext('musta värvi tekst');

echo '<pre>';
print_r($sentence3);
echo '</pre>';

$sentence3->show();
echo '<hr/>';


$sentence4 = new ctext('punast värvi tekst');

$sentence4->setColor('#FF0000');

echo '<pre>';
print_r($sentence4);
echo '</pre>';

$sentence4->show();
echo '<hr/>';

?>