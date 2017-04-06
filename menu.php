<?php
/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 1/19/17
 * Time: 10:36 AM
 */

// create menu objects
$menu = new template('menu.menu');
$item = new  template('menu.item');

$sql = 'SELECT content_id, title FROM content WHERE '.'parent_id="0" AND show_in_menu="1"';
$sql = $sql.' ORDER BY sort ASC';

$res = $db->getArray($sql);

if ($res != false) {
    foreach ($res as $page) {
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $item->set('link', $link);
        $item->set('name', tr($page['title']));
        $menu->add('items', $item->parse());
    }
}
if(USER_ID != ROLE_NONE) {
    $link = $http->getLink(array('act' => 'logout'));
    $item->set('link', $link);
    $item->set('name', tr('Logi valja'));
    $menu->add('items', $item->parse());
}



?>