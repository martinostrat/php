<?php

/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 1/26/17
 * Time: 1:24 PM
 */

class mysql
{// class begin
    // class variables
    var $conn = false; // connection to database server
    var $host = false; // database server name/ip
    var $user = false; // database server user name
    var $pass = false; // database server user password
    var $dbname = false; // one of user databases
    var $history = array(); // database object log array


    function __construct($h, $u, $p, $dbn){
        $this->host = $h; // real database server name
        $this->user = $u; // real database server user name
        $this->pass = $p; // real database server user password
        $this->dbname = $dbn; // database server user database
        $this->connect(); // connect to real database server
    }

    // connection to database server
    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if(mysqli_connect_error()){
            echo 'Viga andmebaasi ühendamisega<br />';
            exit;
        }
    }

    // query time control
    function getMicrotime(){
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    // query to database
    function query($sql){
        $begin = $this->getMicrotime();
        $res = mysqli_query($this->conn, $sql);
        if($res === FALSE){
            echo 'Viga päringuga <b>'.$sql.'</b><br />';
            echo mysqli_error($this->conn).'<br />';
            exit;
        }
        $time = $this->getMicrotime() - $begin;
        $this->history[] = array(
            'sql' => $sql,
            'time' => $time
        );
        return $res;
    }

    // data query from database
    function getArray($sql){
        $res = $this->query($sql);
        $data = array();
        while ($record = mysqli_fetch_assoc($res)){
            $data[] = $record;
        }
        if(count($data) == 0){
            return false;
        }
        return $data;
    }

    // log history output
    function showHistory(){
        if(count($this->history) > 0){
            echo '<hr />';
            foreach ($this->history as $key=>$val){
                echo '<li>'.$val['sql'].'<br />';
                echo '<strong>'.round($val['time'], 6).'</strong></li>';
            }
        }
    }
}

