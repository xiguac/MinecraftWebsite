<?php
$conf = array(
    "server_name" => "测试",
    "captcha" => "tencent",
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
    <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />

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
                        <br /><?php echo $conf['server_name']?> - 用户注册
                    </h1>
                    <div class="navigation-wrapper iUp">
<form class="layui-form" onsubmit="return false" action="##" method="post" id="regform">
  <div class="layui-form-item">
    <label class="layui-form-label">玩家名</label>
    <div class="layui-input-block">
      <input type="text" name="username" required placeholder="请输入您的玩家名" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">密码</label>
    <div class="layui-input-block">
      <input type="password" name="password" required placeholder="请输入需要设置的密码" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">重复密码</label>
    <div class="layui-input-block">
      <input type="password" name="password2" required placeholder="请再次输入需要设置密码" autocomplete="off" class="layui-input">
    </div>
  </div>
<?php if($conf['captcha']=="geetest"){?>
<div class="layui-form-item">
    <label class="layui-form-label">验证码</label>
      <div id="geetestcaptcha"></div>
</div>
<?php }?>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn layui-btn-fluid layui-btn-normal" id="reg">立即注册</button>
    </div>
  </div>
</form>
                    </div>
                </div>
            </div>
            <div class="panel-cover--overlay cover-slate"></div>
        </div>
    </header>
    <script type="text/javascript" src="./static/js/jquery.min.js"></script>
    <script type="text/javascript" src="./static/js/main.js"></script>
<?php if($conf['captcha']=="tencent"){?>
    <script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
    <script>
    $("#reg").click(function(){
            var username = regform.username.value;
            var password = regform.password.value;
            if(password==regform.password2.value){
                var Callback = function(res){
	        if (res.ret === 0) {
	            var param = {"username":username,"password":password,"ticket":res.ticket,"randstr":res.randstr}
	            $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "ajax.php?act=reg" ,
                    data: param,
                    success: function (result) {
                        if (result.code == 1) {
                            alert('注册成功！');
                        }
                        if (result.code == 0) {
                            alert('注册失败，内部错误！');
                        }
                        if (result.code == -1) {
                            alert('玩家名或密码不能为空！');
                        }
                        if (result.code == -2) {
                            alert('玩家名名不合法(4~15位，仅限字母，数字，下划线)！');
                        }
                        if (result.code == -3) {
                            alert('此玩家名已被占用，请更换');
                        }
                    },  
                });
    	    }else{
    	        alert('请先完成验证码!');
    	    }
        }
                new TencentCaptcha('2046626881', Callback).show();
            }else{
                alert('两次密码不一致');
            }
        })
    </script>
<?php }elseif($conf['captcha']=="geetest"){?>
    <script src="https://static.geetest.com/v4/gt4.js"></script>
    <script>
    //正在开发……
        initGeetest4({
            captchaId: "93daa0ff43cc4d8a36fac10b5ceb85e4",
            product: 'float',
            language: "zho",
            nextWidth:"100%",
            riskType:'slide'
        },function (captcha) {
            
        // captcha为验证码实例
        captcha.appendTo("#geetestcaptcha");
    </script>
<?php }?>
</body>

</html>