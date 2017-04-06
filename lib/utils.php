<?php
/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 1/26/17
 * Time: 1:44 PM
 */

function fixDb($val){
    return '"'.addslashes($val).'"';
}