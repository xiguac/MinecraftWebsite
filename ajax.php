<?php
include('./common/common.php');
@header('Access-Control-Allow-Origin:*');
$act = htmlspecialchars($_GET['act']);
$time = date("Y-m-d H:i:s",time());

switch($act){
case 'reg':
    $ticket = htmlspecialchars($_POST['ticket']);
    $randstr = htmlspecialchars($_POST['randstr']);
    if(!empty($ticket) && !empty($randstr)){
        if(HttpPost("https://api.oa5.xyz/tencent_captcha/api.php","ticket=".$ticket."&randstr=".$randstr)==1){
            $captcha = "pass";
        }
    }
    
if($captcha=="pass"){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    if(empty($username) or empty($password)){exit('{"code":-1}');}
    if(preg_match('/^[a-zA-Z0-9_]{4,15}$/', $username, $matches)){
        $check = $DB->query("SELECT * FROM `authme` WHERE `username` = '".$username."'");
        if (!$check->num_rows > 0) {
            $salt = uniqid();
            $password = "\$SHA$".$salt."$".hash('sha256',hash('sha256',$password).$salt);
            $sql = "INSERT INTO `authme`.`authme` (`id`, `username`, `realname`, `password`, `ip`, `lastlogin`, `regip`, `regdate`, `x`, `y`, `z`, `world`, `yaw`, `pitch`, `email`, `isLogged`, `hasSession`) VALUES (NULL, '".$username."', '".ucwords($username)."', '".$password."', '".getIp()."', '0000-00-00 00:00:00', '".getIp()."', '".date("Y-m-d H:i:s",time())."', '0', '0', '0', 'world', NULL, NULL, NULL, '0', '0');";
            if($DB->query($sql) === TRUE) {
                exit('{"code":1}');
            }else{
                exit('{"code":0}');
            }
        }else{
            exit('{"code":-3}');
        }
    }else{
        exit('{"code":-2}');
    }
} 
break;
default:
	exit('{"code":0,"msg":"No Act"}');
break;
}
?>