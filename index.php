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

// Load template file content
$tmpl = new template('main');

// Add pairs of template element names and real values
$tmpl->set('menu', 'my menu');
$tmpl->set('nav_bar', 'my nav');
$tmpl->set('lang_bar', 'my lang bar');
$tmpl->set('content', 'my content');

echo '<pre>';
print_r($tmpl);
echo '</pre>';



