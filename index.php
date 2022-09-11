<?php
$conf = array(
    "server_name" => "测试",
    "server_tag1" => "简介",
    "server_tag2" => "详情",
    );
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="force-rendering" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $conf['server_name']?></title>
    <link rel="stylesheet" type="text/css" href="./static/css/style.css">
    <link rel="stylesheet" type="text/css" href="./static/css/iconfont.css">
    <link rel="apple-touch-icon" href="./static/images/apple-touch-icon.png">
    <link rel="icon" href="./static/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/volantis-x/cdn-fontawesome-pro@master/css/all.min.css"
        media="all">
</head>

<body oncontextmenu=self.event.returnValue=false onselectstart="return false">
    <header id="panel" class="panel-cover">
        <div class="panel-main">
            <div class="panel-main__inner panel-inverted">
                <div class="panel-main__content">
                    <div class="ih-item circle effect right_to_left">
                        <div class="img"><img src="./static/images/logo.png" alt="img">
                        </div>
                    </div>
                    <h1 class="panel-cover__title panel-title iUp">
                        <br /><?php echo $conf['server_name']?>
                    </h1>
                    <p class="panel-cover__subtitle panel-subtitle iUp"><?php echo $conf['server_tag1']?></p>
                    <hr class="panel-cover__divider iUp" />
                    <p id="description" class="panel-cover__description iUp"><?php echo $conf['server_tag2']?>
                        <br />
                    </p>
                    <div class="navigation-wrapper iUp">
                        <div>
                            <nav class="cover-navigation cover-navigation--primary">
                                <ul class="navigation">
                                    <li class="navigation__item">
                                        <a href="#" target="_blank" class="blog-button">
                                            <div>加入QQ群</div>
                                        </a>
                                    </li>
                                    <li class="navigation__item">
                                        <a href="./reg.php" target="_blank" class="blog-button">
                                            <div>注册账号</div>
                                        </a>
                                    </li>
                                    <li class="navigation__item">
                                        <a href="https://skin.oa5.xyz" target="_blank" class="blog-button">
                                            <div>皮肤站</div>
                                        </a>
                                    </li>
                                    <li class="navigation__item">
                                        <a href="#" class="blog-button">
                                            <div>客户端下载</div>
                                        </a>
                                    </li>
                                    <li class="navigation__item">
                                        <a href="https://gamepay.ks2.xyz" target="_blank" class="blog-button">
                                            <div>在线充值</div>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="iUp">
                            <nav class="cover-navigation navigation--social">
                                <ul class="navigation">

                                    <li class="navigation__item">
                                        <a href="https://github.com/xiguac" title="Github" target="_blank">
                                            <i class="fab fa-github"></i>
                                            <span class="label">Github</span>
                                        </a>
                                    </li>
                                    <li class="navigation__item">
                                        <a href="http://wpa.qq.com/msgrd?v=3&uin=1561523848&site=qq&menu=yes" title="QQ"
                                            target="_blank">
                                            <i class="fab fa-qq"></i>
                                            <span class="label">QQ</span>
                                        </a>
                                    </li>
                                    <li class="navigation__item">
                                        <a href="mailto:i@oa5.xyz" title="Email">
                                            <i class="fas fa-envelope"></i>
                                            <span class="label">Email</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-cover--overlay cover-slate"></div>
        </div>
    </header>
    <!--izitoast内容-->
    <script>
        function update() {
            iziToast.info({
                icon: 'fad fa-times-octagon',
                backgroundColor: '#efefef',
                title: '站点暂时关闭',
                message: '只是出现了一点小问题 ~'
            });
        }
    </script>
    <script type="text/javascript" src="./static/js/jquery.min.js"></script>
    <script type="text/javascript" src="./static/js/main.js"></script>
</body>

</html>