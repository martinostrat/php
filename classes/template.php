<?php

/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 1/12/17
 * Time: 12:27 PM
 */

if (!defined('TMPL_DIR')) {
    define('TMPL_DIR', '../tmpl/');
}

class template
{
    var $file = ''; // template file name
    var $content = false; // template content - is now empty

    function __construct($f) {
        $this->file = $f;
        $this->loadFile();
    }

    function loadFile() {
        $f = $this->file;

        if (!is_dir(TMPL_DIR)){
            echo 'Kataloogi '.TMPL_DIR.' ei ole leitud<br/>';
            exit;
        }

        if (file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }

        $f = TMPL_DIR.$this->file;
        if (file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }

        $f = TMPL_DIR.$this->file.'.html';
        if (file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }

        if ($this->content === false) {
            echo 'Ei saanud lugeda faili '.$this->file.'<br/>';
            exit;
        }
    }

    function readFile($f) {
        $this->content = file_get_contents($f);
    }



}