<?php

/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 1/13/17
 * Time: 12:05 PM
 */

require_once 'text.php';

class ctext extends text {

    // class variable - color
    var $color = false; // color doesnt exist

    // methods
    // set color
    function setColor($c) {
        $this->color = $c;
    }

    // show object
    function show() {
        if ($this->color === false){
            parent::show();
        } else {
            echo '<font color="'.$this->color.'">'.$this->str.'</font>';
        }
    }

}