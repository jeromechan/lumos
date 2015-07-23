<?php
/**
 * Copyright © 2015 AboutCoder.COM. All rights reserved.
 *
 * @author chenjinlong
 * @date 7/19/15
 * @time 12:57 AM
 * @description client.php
 */
?>
<?php
require_once 'lib/config.php';
include_once 'header.php';
$c = new \Ss\User\Invite();
?>
<body>
<div class="container">
    <?php include_once 'nav.php';?>

    <div class="row marketing" style="text-align: center;">
        <div class="col-lg-6">
            <a href="https://play.google.com/store/apps/details?id=com.github.shadowsocks"><h4>Android</h4></a>
            <p>Android客户端</p>
            <h4><a href="http://sourceforge.net/projects/shadowsocksgui/files/dist/">Shadowsocks C#</a></h4>
            <p> Windows用户推荐此客户端</p>
        </div>

        <div class="col-lg-6">
            <a href="https://itunes.apple.com/us/app/shadowsocks/id665729974?mt=8"><h4>iOS</h4></a>
            <p>iOS客户端</p>

            <h4><a href="https://github.com/shadowsocks/shadowsocks-iOS/releases">Mac OS X</a></h4>
            <p> OS X用户推荐此客户端</p>
        </div>
    </div><?php
    include_once 'footer.php';
    include_once 'ana.php';?>

</div> <!-- /container -->
</body>
</html>

