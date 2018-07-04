<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;
use DateTime;

class MySession extends Model {    
    private $cache = 20; // minutes - default value

    public function setSession() {
        Session::put('vercan_user', [
            "session" => session_id(),
            "start" => date('Y-m-d H:i:s'),
            "ip" => $_SERVER['REMOTE_ADDR'],
            "url" => strip_tags(trim($_SERVER['REQUEST_URI'])),
            "agent" => $_SERVER['HTTP_USER_AGENT']
        ]);
    }

    public function endSession() {
        Session::forget('vercan_user');
    }

    public function checkSession() {
        // check 1
        if (null === Session::get('vercan_user'))     
            return false;        
        
        // check 2
        //$hf_user = Session::get('hf_user');
        //if (!$this->checkSessionTime($hf_user['start']))
        //    return false;

        return true;
    }

    private function checkSessionTime($datetime) {
        $date = new DateTime($datetime);
        $timestamp = $date->getTimestamp();
        $now = time();
        $diff = $now - $this->cache * 60;

        if ($diff > $timestamp)
            return false;
        
        return true;
    }
}
