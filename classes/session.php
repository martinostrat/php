<?php

/**
 * Created by PhpStorm.
 * User: martinostrat
 * Date: 1/25/17
 * Time: 12:48 AM
 */
class session
{


    var $sid = false;
    var $vars = array();
    var $http = false;
    var $db = false;
    var $anonymous = true;
    var $timeout = 1800;


// add constructor

    function __construct(&$http, &$db)
    {
        $this->http = &$http;
        $this->db = &$db;
        $this->sid = $http->get('sid');
        $this->CreateSession();
    }


    function setAnonymous($bool)
    {
        $this->anonymous = $bool;
    }

    function setTimeout($t)
    {
        $this->timeout = $t;
    }

// delete session
    function clearSession()
    {
        $sql = 'DELETE FROM session ' . 'WHERE ' .
            time() . ' - UNIX_TIMESTAMP(changed) > ' .
            $this->timeout;
        $this->db->query($sql);
    }

// create session
    function createSession($user = false)
    {      // anon user session
        if ($user == false) {
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonymous'
            );
        }
        // create session id number
        $sid = md5(uniqid(time() . mt_rand(1, 1000)), true);
        // add session data to db
        $sql = 'INSERT INTO session SET ' .
            'sid=' . fixDb($sid) . ', ' .
            'user_id=' . fixDb($user['user_id']) . ', ' .
            'user_data=' . fixDb(serialize($user)) . ', ' .
            'login_ip=' . fixDb(REMOTE_ADDR) . ', ' .
            'created=NOW()';
        $this->db->query($sql);
        // set up session id number
        $this->sid = $sid;
        // set up sid http value
        $this->http->set('sid');

    }

} // end class