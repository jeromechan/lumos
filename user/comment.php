<?php
/**
 * Copyright © 2014 AboutCoder.COM All rights reserved.
 *
 * @author chenjinlong
 * @date 7/21/15
 * @time 11:12 PM
 * @description comment.php
 */
session_start();
require_once '../lib/config.php';

//判断是否已登录
$sessionLogin = new \Ss\User\SessionLogin($_COOKIE['PHPSESSID']);
$sessionLoginData = $sessionLogin->GetSessArray();
if (empty($sessionLoginData)) {
    header("Location:index.php");
    return;
}
$uid = $sessionLoginData['uid'];
$email = $sessionLoginData['user_email'];

require_once '_main.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            讨论区
            <small>Discussions</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary padding-left-right">

                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                        /* * * CONFIGURATION VARIABLES * * */
                        var disqus_shortname = 'lumosac';
                        var disqus_identifier = "<?php echo $uid . '#' . $email?>";
                        var disqus_title = 'Discussions';
                        // var disqus_url = '';

                        /* * * DON'T EDIT BELOW THIS LINE * * */
                        (function () {
                            var dsq = document.createElement('script');
                            dsq.type = 'text/javascript';
                            dsq.async = true;
                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript"
                                                                      rel="nofollow">comments
                            powered by Disqus.</a></noscript>

                </div>
            </div>
        </div>
    </section>
</div>
<?php
require_once '_footer.php'; ?>