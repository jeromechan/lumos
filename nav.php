<div class="header">
    <ul class="nav nav-pills pull-right" role="tablist" style="margin-top: 20px;">
        <li role="presentation"><a href="index.php">主页</a></li>
        <li role="presentation"><a href="code.php">邀请码</a></li>

        <?php
        $sessionLogin = new \Ss\User\SessionLogin($_COOKIE['PHPSESSID']);
        $sessionLoginData = $sessionLogin->GetSessArray();
        if (empty($sessionLoginData)) {
        ?>
        <li role="presentation"><a href="user/register.php">注册</a></li>
        <li role="presentation"><a href="user/index.php">登录</a></li>
        <?php } else {?>
            <li role="presentation"><a href="client.php">客户端下载</a></li>
            <li role="presentation"><a href="user/index.php">我的用户中心</a></li>
        <?php }?>
    </ul>
    <img src="asset/img/lumos-logo.jpg" alt="<?php echo $site_name;?>" class="index-logo">
<!--    <h3 class="text-muted">--><?php //echo $site_name; ?><!--</h3>-->
</div>
