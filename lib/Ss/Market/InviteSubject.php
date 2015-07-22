<?php

/**
 * Copyright © 2014 Tuniu Inc. All rights reserved.
 *
 * @author chenjinlong
 * @date 7/23/15
 * @time 12:35 AM
 * @description InviteGame.php
 */
namespace Ss\Market;

class InviteSubject
{
    public $PHPSESSID;
    private $dbc;
    private $db;

    private $table = "invite_subject";

    function  __construct($PHPSESSID = ""){
        global $dbc;
        global $db;
        $this->PHPSESSID = $PHPSESSID;
        $this->dbc  = $dbc;
        $this->db   = $db;
    }

    function GetInviteSubjectArray($idArray){
        $datas = $this->db->select($this->table,"*",[
            "id" => $idArray
        ]);
        return $datas;
    }
}