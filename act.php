<?php
/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 2/8/17
 * Time: 10:39 AM
 */

$act = $http->get('act'); // act value from url

$fn = ACTS_DIR.str_replace('.', '/', $act).'.php';

// if such act file exists - use it
if(file_exists($fn) and is_file($fn) and is_readable($fn)){
    require_once $fn;
} else {
    $fn = ACTS_DIR.DEFAULT_ACT.'.php';
    $http->set('act', DEFAULT_ACT);
    require_once $fn;
}