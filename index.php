<?php
session_start();
include_once 'lib/config.php';
include_once 'header.php';
?>
<body>
<div class="container">
    <?php include_once 'nav.php';?>

    <div class="jumbotron">
        <h2><?php echo $site_name; ?> is coming...</h2>
<!--        <p class="lead">“畅游全世界任一站点，让互联网不再有国界”</p>-->
<!--        <p><a class="btn btn-lg btn-success" href="user/register.php" role="button">立即注册</a></p>-->
    </div>

    <?php
            include_once 'footer.php';
            include_once 'ana.php';?>
</div> <!-- /container -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="asset/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
