<?php
/**
 * Copyright © 2014 AboutCoder.COM. All rights reserved.
 *
 * @author chenjinlong
 * @date 7/22/15
 * @time 10:28 PM
 * @description _invite_game.php
 */

require_once '../lib/config.php';
$curStep = $_POST['curStep'];
$userInviteGameEmail = $_COOKIE['PUE'];
if (!empty($userInviteGameEmail) && $curStep != 0) {
    $emailInvite = base64_decode($userInviteGameEmail);
} else if ($curStep != 0) {
    $emailInvite = "";
    $rs['code'] = '-3';
    $rs['ok'] = '-3';
    $rs['msg'] = "您忘记了填写邮箱，请重新填写^_^";
    echo json_encode($rs);
    return;
} else {
    $emailInvite = "";
    setcookie("PUE", "", time() - 3600);
}
$rs = array();

// step 0
if ($curStep == 0) {
    $email = strval($_POST['email']);
    $fullname = strval($_POST['fullname']);
    // 用户名，全名记录DB
    if (!empty($email)) {
        $inviteParicipant = new \Ss\Market\InviteParticipant();
        if (empty($inviteParicipant->GetInviteParticipantArray($email))) {
            $inviteParicipant->AddInviteParticipant($email, $fullname);
            $rs['code'] = '1';
            $rs['ok'] = '1';
            $rs['p'] = '1';
            $rs['msg'] = "提交成功";

            setcookie("PUE", base64_encode($email), time() + 300);
//            header("Location:invite_game.php?p=1");
//            return;
        } else {
            $rs['code'] = '-2';
            $rs['ok'] = '-2';
            $rs['msg'] = "该用户已参加过该活动";
        }
    } else {
        $rs['code'] = '-1';
        $rs['ok'] = '-1';
        $rs['msg'] = "请填写您的邮箱与姓名";
    }
}
// step 1
elseif ($curStep == 1) {
    $rs['code'] = '1';
    $rs['ok'] = '1';
    $rs['msg'] = "提交成功";
}

echo json_encode($rs);