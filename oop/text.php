<?php

/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 1/12/17
 * Time: 10:51 AM
 */
class text
{
    var $str = '';

    function __construct($s = '') {
        $this->setText($s);
    }

    function setText($s) {
        $this->str = $s;
    }

    function show() {
        echo $this->str.'<br/>';
    }
}
