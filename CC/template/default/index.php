<?php
session_start();
$ip=real_ip();
if(isset($_POST['km'])){
	if(!$_SESSION['pass_error'])$_SESSION['pass_error']=0;
	$km=daddslashes($_POST['km']);
	$row = $DB->get_row("SELECT * FROM lan_kms WHERE km='$km' limit 1");
	if($_SESSION['pass_error']>5) {
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('请认真填写卡密');history.go(-1);</script>");
	}elseif($km=='') {
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('卡密输入不可为空');history.go(-1);</script>");
	}elseif ($km != $row['km']) {
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您输入的卡密不正确！');history.go(-1);</script>");
	}elseif($conf['dip']==2){
	if($ip!=$row['ip']){
	exit("<script language='javascript'>alert('请使用激活该卡密的IP登录');history.go(-1);</script>");
	}
	}elseif($row['km']==$km){
       
               $session=md5($km.$password_hash);
		$token=authcode("{$km}\t{$session}", 'ENCODE', SYS_KEY);
		setcookie("user_token", $token, time() + 604800,'/');
		@header('Content-Type: text/html; charset=UTF-8');
	$ipjl="update lan_kms set  `ip`='".$ip."'where km='".$km."'";	
	$DB->query($ipjl);
		exit("<script language='javascript'>alert('激活卡密成功！');window.location.href='user';</script>");
	}
}elseif(isset($_GET['logout'])){
	setcookie("user_token", "", time() - 604800, '/');
	@header('Content-Type: text/html; charset=UTF-8');
	exit("<script language='javascript'>alert('您已成功注销本次登陆！');window.location.href='/index.php';</script>");
}elseif($islogin2==1){
	@header('Content-Type: text/html; charset=UTF-8');
	exit("<script language='javascript'>alert('您已登陆！');window.location.href='user';</script>");
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $conf['sitename']?></title>
	<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">


	<!-- Fonts and icons -->
	<script src="/assets/dl/js/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../Core/asset/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="/assets/dl/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/dl/css/azzara.min.css">
</head>
<body class="login"style="background-image: url(/assets/dl/bj2.jpg); background-size: cover;" >
   
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center"><?php echo $conf['sitename']?> - 卡密激活 </h3><br>
			<div class="login-form">
			 <form action="./index.php" method="POST" role="form" class="form-horizontal">
		
			
				<div class="form-group form-floating-label">
					<input id="km" name="km" type="text" class="form-control input-border-bottom" required="">
					<label for="username" class="placeholder">请输入激活卡密</label>
				</div>
				
				<div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="rememberme">
						<label class="custom-control-label" for="rememberme">记住此卡密</label>
					</div>
					
				
				</div>
				
				
								<div class="form-action mb-3">
				<button class="btn btn-primary btn-rounded btn-login" type="submit">使用卡密</button>
				</div>
				 </form>
				<div class="login-account">
				
				</div>
				
				
					
					
				

				</form>
				
			</div>
		</div>
	</div>
	<script src="/assets/dl/js/jquery.3.2.1.min.js"></script>
	<script src="/assets/dl/js/jquery-ui.min.js"></script>
	<script src="/assets/dl/js/popper.min.js"></script>
	<script src="/assets/dl/js/bootstrap.min.js"></script>
	<script src="/assets/dl/js/ready.js"></script>
	<script src="/assets/dl/js/index.js"></script>
    <script src="/assets/dl/js/jquery.min.js"></script>
    <script src="/assets/dl/js/bootstrap.min_1.js"></script>
    <script src="https://cdn.izxv.cn/codepay/login/js/jquery.cookie.min.js"></script>
    <script src="/assets/dl/js/layer.js"></script>
    <script src="/assets/dl/js/gt.js"></script>
	
	
	
	

</body></html>