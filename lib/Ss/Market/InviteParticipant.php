<?php
/**
 * Copyright © 2014 Tuniu Inc. All rights reserved.
 *
 * @author chenjinlong
 * @date 7/23/15
 * @time 1:14 AM
 * @description InviteParticipant.php
 */

namespace Ss\Market;


class InviteParticipant
{
    public $PHPSESSID;
    private $dbc;
    private $db;

    private $table = "invite_participant";

    function  __construct($PHPSESSID = ""){
        global $dbc;
        global $db;
        $this->PHPSESSID = $PHPSESSID;
        $this->dbc  = $dbc;
        $this->db   = $db;
    }

    function GetInviteParticipantArray($email){
        $datas = $this->db->select($this->table, "*", [
            "email" => $email
        ]);
        return $datas[0];
    }

    function AddInviteParticipant($email, $fullname){
        $this->db->insert($this->table, [
            "email" => $email,
            "fullname" => $fullname
        ]);
    }

    function UpdateInviteParticipantInitGPRS($gprsValue, $email){
        $this->db->update($this->table, [
            "init_gprs" => intval($gprsValue)
        ],[
            "email" => $email
        ]);
    }
}