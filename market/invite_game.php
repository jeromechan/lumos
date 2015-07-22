<?php
$curStep = !empty($_GET['p']) ? $_GET['p'] : 0;
if ($curStep == 0) {
    setcookie("PUE", "", time() - 3600);
}?>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $site_name; ?>邀请码活动</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../asset/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <link href="../asset/css/blue.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container">
    <?php
    require_once '../lib/config.php';
    /**
     * Copyright © 2014 AboutCoder.COM. All rights reserved.
     *
     * @author chenjinlong
     * @date 7/22/15
     * @time 10:28 PM
     * @description invite_game.php
     */

    $subjectIds = array();
    $inviteSubject = new \Ss\Market\InviteSubject();
    for($i=0; sizeof($subjectIds)<5; $i++) {
        $id = rand(1, 15);
        if (in_array($id, $subjectIds)) {
            continue;
        } else {
            array_push($subjectIds, $id);
        }
    }
    $subjectContents = $inviteSubject->GetInviteSubjectArray($subjectIds);


    $inviteParticipant = new \Ss\Market\InviteParticipant();

    // 设置活动上限数为50个用户
    if ($inviteParticipant->GetInviteParticipantArrayCount() >= 50) {
        $curStep = -1;
    }

    // 初始化流量
    $gameResultGPRS = rand(0, 2048);
    if ($curStep == 2 && !empty($_COOKIE['PUE'])) {
        $inviteParticipantData = $inviteParticipant->GetInviteParticipantArray(strval(base64_decode($_COOKIE['PUE'])));
        if ($inviteParticipantData['init_gprs'] == 0) {
            $inviteParticipant->UpdateInviteParticipantInitGPRS($gameResultGPRS, strval(base64_decode($_COOKIE['PUE'])));
        } else {
            $gameResultGPRS = $inviteParticipantData['init_gprs'];
        }
    }

    ?>

    <?php if ($curStep == 0) {
        ?>
        <div class="row marketing" style="text-align: center;margin-top: 10%;
        margin-left: 50px;margin-right: 50px;">
            <h3>抢Lumos邀请码活动正在进行中...</h3>

            <form class="form-horizontal">
                <div class="form-group">
                    <label for="email" class="lead">请留下您的宝贵邮箱，注册邀请码将在24h内发送至被选中的参与人员的邮箱</label>
                    <input type="email" class="form-control" id="email" placeholder="Your Email address">
                    <label for="fullname" class="lead" style="margin-top: 30px;">请留下您的宝贵姓名，熟悉人机会会更大哦~</label>
                    <input type="text" class="form-control" id="fullname" placeholder="Your full name">
                </div>
                <button type="button" id="btn_start_game" class="btn btn-info btn-lg glyphicon glyphicon-hand-right">立即参与</button>
            </form>
        </div>
    <?php } ?>

    <?php if ($curStep == 1) {
        foreach ($subjectContents as $item) {
            $questionId = $item['id'];
            $questionTitle = $item['title'];
            $choiceA = $item['choice_a'];
            $choiceB = $item['choice_b'];
            $choiceC = $item['choice_c'];
            $choiceD = $item['choice_d'];
            $rightChoice = $item['right_choice'];
        ?>
        <div style="margin-top: 20px;">
            <h5>
                <b><?php echo $questionTitle; ?></b>
            </h5>

            <input type="hidden" value="<?php echo $rightChoice;?>" id="hiddenRightChoice_<?php echo $questionId; ?>"/>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios<?php echo $questionId; ?>" value="A">
                    <?php echo $choiceA; ?>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios<?php echo $questionId; ?>" value="B">
                    <?php echo $choiceB; ?>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios<?php echo $questionId; ?>" value="C">
                    <?php echo $choiceC; ?>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios<?php echo $questionId; ?>" value="D">
                    <?php echo $choiceD; ?>
                </label>
            </div>
        </div>
    <?php }?>
        <button type="button" id="do_subject_works" class="btn btn-info btn-lg" style="margin-bottom: 30px; width: 150px;">提交</button>
    <?php } ?>

    <?php if ($curStep == 2) {
        ?>
        <div class="row" style="text-align: center;margin-top: 10%;margin-bottom: 90%;">
            <h3>恭喜你，您的答卷赢得了<?php echo $gameResultGPRS; ?>MB的Lumos VPN流量，如何通过本次筛选，邀请码将于24h内发送到您填写的的邮箱中，请注意查收^_^</h3>
            <button type="button" id="btn_goto_lumos" class="btn btn-info btn-lg glyphicon glyphicon-share-alt">前往Lumos</button>
        </div>
    <?php } ?>

    <?php if ($curStep == -1) {
        ?>
        <div class="row" style="text-align: center;margin-top: 10%;margin-bottom: 90%;">
            <h3>邀请码活动已结束，欢迎持续关注lumos.aboutcoder.com！</h3>
            <button type="button" id="btn_goto_lumos" class="btn btn-info btn-lg glyphicon glyphicon-share-alt">前往Lumos</button>
        </div>
    <?php } ?>





</div>
<!-- jQuery 2.1.3 -->
<script src="../asset/js/jQuery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../asset/js/bootstrap.min.js" type="text/javascript"></script>
<script>

    $(document).ready(function(){
        function start_game(){
            $.ajax({
                type:"POST",
                url:"_invite_game.php",
                dataType:"json",
                data:{
                    email: $("#email").val(),
                    fullname: $("#fullname").val(),
                    curStep: <?php echo $curStep;?>
                },
                success:function(data){
                    if(data.ok == "1"){
                        window.setTimeout("location.href='invite_game.php?p=1'", 500);
                    }else if (data.ok == "-1"){
                        alert(data.msg);
                    }else if (data.ok == "-2"){
                        alert(data.msg);
                    }else if (data.ok == "-4"){
                        alert(data.msg);
                    }else {
                        alert("系统忙，请稍后再试^_^");
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            });
        }

        function do_subject_works(){
            $.ajax({
                type:"POST",
                url:"_invite_game.php",
                dataType:"json",
                data:{
                    curStep: <?php echo $curStep;?>
                },
                success:function(data){
                    if(data.ok == "1"){
                        window.setTimeout("location.href='invite_game.php?p=2'", 500);
                    }else if (data.ok == "-1"){
                        alert(data.msg);
                    }else if (data.ok == "-2"){
                        alert(data.msg);
                    }else if (data.ok == "-3"){
                        alert(data.msg);
                    }else {
                        alert("系统忙，请稍后再试^_^");
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            });
        }
//        $("html").keydown(function(event){
//            if(event.keyCode==13){
//                login();
//            }
//        });
        $("#btn_start_game").click(function(){
            start_game();
        });
        $("#do_subject_works").click(function(){
            do_subject_works();
        });
        $("#btn_goto_lumos").click(function(){
            window.setTimeout("location.href='../index.php'", 500);
        });
//        $("#ok-close").click(function(){
//            $("#msg-success").hide(100);
//        });
//        $("#error-close").click(function(){
//            $("#msg-error").hide(100);
//        });
    })
</script>

<?php
include_once '../ana.php'; ?>
</body>
</html>
