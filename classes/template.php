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
    var $vars = array(); // table for real values of html table output

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

        $f = TMPL_DIR.str_replace('.', '/', $this->file).'.html';
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

    // set up html template elements and their real values
    // $name - template element name
    // $val - real value for template element
    function set($name, $val) {
        $this->vars[$name] = $val;
    }

    // assign values to element
    function add($name, $val) {
        if (!isset($this->vars[$name])) {
            $this->set($name, $val);
        } else {
            $this->vars[$name] = $this->vars[$name].$val;
        }
    }

    function parse() {
        $str = $this->content;

        foreach ($this->vars as $name=>$val) {
           $str = str_replace('{'.$name.'}', $val, $str);
        }
        // return template content with real values
        return $str;
    } // parse


}