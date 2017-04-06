<?php

/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 1/18/17
 * Time: 11:57 PM
 */

function fixHtml($val) {
    return htmlentities($val);
}

class http
{// http class begin
    // class variables
    var $server = array(); // server data
    var $vars = array(); // http data
    var $cookie = array(); // cookie data
    // class methods
    // class construct for object initializing
    function __construct(){
        $this->init(); // initialize variables with real data
        $this->initConst(); // initialize constants by real data values
    }// construct
    // initialize class variables and set up real data
    function init(){
        $this->server = $_SERVER; // server real data
        $this->cookie = $_COOKIE; // cookie real data
        $this->vars = array_merge($_GET, $_POST, $_FILES); // http real data
    }
    // initialize some server constants
    function initConst(){
        // define array with some server element names
        $vars = array('REMOTE_ADDR', 'PHP_SELF', 'SCRIPT_NAME', 'HTTP_HOST');
        // controll is constant defined for each constant name
        foreach ($vars as $var){
            if(!defined($var) and isset($this->server[$var])){
                define($var, $this->server[$var]);
            }
        }// foreach
    }// initConst
    // set up $this->vars array elements: element_name => element_value
    function set($name, $val){
        $this->vars[$name] = $val;
    }// set

    function get($name, $fix = false){
        if (isset($this->vars[$name])) {
            if($fix) {
                return fixHtml($this->vars[$name]);
            }
            return $this->vars[$name];
        }
        return false;
    }

    function del($name){
        if(isset($this->vars[$name])){
            unset($this->vars[$name]);
        }
    }
}// http class end