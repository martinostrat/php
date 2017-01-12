<?php
/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 1/12/17
 * Time: 12:59 PM
 */

define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
require_once CLASSES_DIR.'template.php';

$tmpl = new template('main.html');
$tmpl->file = 'main.html';

echo '<pre>';
print_r($tmpl);
echo '</pre>';



