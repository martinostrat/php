<?php

/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 1/18/17
 * Time: 4:08 PM
 */
// useful function
function fixUrl($val){
    return urlencode($val);
}
// import http class file
require_once 'http.php';
class linkobject extends http
{
    // class variables
    var $baseUrl = false;
    var $protocol = 'http://';
    var $delim = '&amp;';
    var $eq = '=';

    //add if exists
    var $aie = array('sid'=>'sid');

    // class methods
    // construct
    function __construct(){
        parent::__construct(); // import http class construct
        $this->baseUrl = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    }

    function addToLink(&$link, $name, $val){
        // if pair is already created
        if($link != ''){
            $link = $link.$this->delim;
        }
        $link = $link.fixUrl($name).$this->eq.fixUrl($val);

        echo $link.'<br />';
    }

    // create url -> baseUrl + data pairs
    function getLink($add = array(), $aie = array(), $not = array()){
       $link = '';
       foreach ($add as $name => $val) {
           $this->addToLink($link, $name, $val);
       }
       foreach ($aie as $name) {
           $val = $this->get($name);
           if ($val !== false) {
               $this->addToLink($link, $name, $val);
           }
       }
       foreach ($this->aie as $name) {
           $val = $this->get($name);
           if ($val !== false and !in_array($name, $not)) {
               $this->addToLink($link, $name, $val);
           }
       }
       if ($link != '') {
           $link = $this->baseUrl.'?'.$link;
       } else {
           $link = $this->baseUrl;
       }
       return $link;
    }
}// class end