
<?php

include("../includes/common.php");

if(isset($_POST['user']) && isset($_POST['pass'])){
	$user=daddslashes($_POST['user']);
	$pass=daddslashes($_POST['pass']);
	if($user==$conf['admin_user'] && $pass==$conf['admin_pwd']) {
		$session=md5($user.$pass.$password_hash);
		$token=authcode("{$user}\t{$session}", 'ENCODE', SYS_KEY);
		setcookie("admin_token", $token, time() + 604800);
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('登陆管理中心成功！');window.location.href='./';</script>");
	}else {
     exit("<script language='javascript'>alert('密码或账号错误！');window.location.href='./';</script>");
	}
}elseif(isset($_GET['logout'])){
	setcookie("admin_token", "", time() - 604800);
	@header('Content-Type: text/html; charset=UTF-8');
	exit("<script language='javascript'>alert('您已成功注销本次登陆！');window.location.href='./login.php';</script>");
}elseif($islogin==1){
	@header('Content-Type: text/html; charset=UTF-8');
	exit("<script language='javascript'>alert('您已登陆！');window.location.href='./';</script>");
}


?>


<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title><?php echo $conf['sitename'];?></title>
<link rel="icon" href="favicon.ico" type="image/ico">
<meta name="author" content="yinqi">
<link href="/assets/gn/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/gn/css/materialdesignicons.min.css" rel="stylesheet">
<link href="/assets/gn/css/style.min.css" rel="stylesheet">
<style>
.login-form .has-feedback {
    position: relative;
}
.login-form .has-feedback .form-control {
    padding-left: 36px;
}
.login-form .has-feedback .mdi {
    position: absolute;
    top: 0;
    left: 0;
    right: auto;
    width: 36px;
    height: 36px;
    line-height: 36px;
    z-index: 4;
    color: #dcdcdc;
    display: block;
    text-align: center;
    pointer-events: none;
}
.login-form .has-feedback.row .mdi {
    left: 15px;
}
</style>
</head>
  
<body class="center-vh" style="background-image: url(/assets/dl/bj2.jpg); background-size: cover;">
<div class="card card-shadowed p-5 w-420 mb-0 mr-2 ml-2">
  <div class="text-center mb-3">
    <a href=""> <img alt="light year admin" height="150" src="<?echo $logo1;?>"> </a>
  </div>

  <form action="./login.php" method="post" class="login-form">
    <div class="form-group has-feedback">
      <span class="mdi mdi-account" aria-hidden="true"></span>
      <input type="text" class="form-control" id="user" name="user"placeholder="用户名">
    </div>

    <div class="form-group has-feedback">
      <span class="mdi mdi-lock" aria-hidden="true"></span>
      <input type="password" class="form-control" id="pass"name="pass" placeholder="密码">
    </div>
    


    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="rememberme">
        <label class="custom-control-label not-user-select" for="rememberme">5天内自动登录</label>
      </div>
    </div>

    <div class="form-group">
      <button class="btn btn-block btn-primary" type="submit">立即登录</button>
    </div>
  </form>
  
  <p class="text-center text-muted mb-0">Copyright © 2023 <a href="">莫名cc测压系统</a>. All right reserved</p>
</div>
  
<script type="text/javascript" src="/assets/gn/js/jquery.min.js"></script>
<script type="text/javascript">;</script>
</body>
</html>