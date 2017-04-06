<?php
/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 1/26/17
 * Time: 1:06 PM
 */

$page_id = $http->get('page_id'); // get page_id from url

// get page content from database according to page_id
$sql = 'SELECT * FROM content WHERE '.
    'content_id="'.$page_id.'"';

// query to database
$res = $db->getArray($sql);
if($res !== FALSE){
    $page = $res[0];
    $http->set('content',$page['content']);
}
