<?php
/**
 * Copyright © 2015 AboutCoder.COM. All rights reserved.
 *
 * @author chenjinlong
 * @date 7/19/15
 * @time 1:30 AM
 * @description SessionLogin.php
 */

namespace Ss\User;


class SessionLogin
{
    public $PHPSESSID;
    private $dbc;
    private $db;

    private $table = "session_login";

    function  __construct($PHPSESSID = ""){
        global $dbc;
        global $db;
        $this->PHPSESSID = $PHPSESSID;
        $this->dbc  = $dbc;
        $this->db   = $db;
    }

    function GetSessArray(){
        $datas = $this->db->select($this->table,"*",[
            "PHPSESSID" => $this->PHPSESSID
        ]);
        return $datas['0'];
    }

    function AddSessionArray($uid, $user_email, $user_pwd){
        $this->db->insert($this->table, [
            "PHPSESSID" => $this->PHPSESSID,
            "uid" => $uid,
            "user_email" => $user_email,
            "user_pwd" => $user_pwd
        ]);
    }

    function DelSessionArray(){
        $this->db->delete($this->table, [
            "PHPSESSID" => $this->PHPSESSID
        ]);
    }

}