<?php

require_once 'conf.php';
require_once 'act.php';

$tmpl = new template('main');
$tmpl->set('header', 'minu lehe pealkiri');
$tmpl->set('style', STYLE_DIR.'main'.'.css');

require_once 'menu.php';

$tmpl-> set('nav_bar', 'minu nav');
$tmpl->set('lang_bar', 'minu keeleriba');

$tmpl->set('content', $http->get('content'));

echo $tmpl->parse();

$sql = 'SELECT NOW()';
$res = $db->getArray($sql);
$sql = 'SELECT NOW()';
$res = $db->getArray($sql);
$sql = 'SELECT NOW()';
$res = $db->getArray($sql);

$db-> showHistory();

echo '<pre>';
print_r($sess);
echo '</pre>';