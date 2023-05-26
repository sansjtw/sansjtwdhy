<?php
include("../includes/common.php");
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
if(isset($_GET['logout'])){
	setcookie("user_token", "", time() - 604800, '/');
	@header('Content-Type: text/html; charset=UTF-8');
	exit("<script language='javascript'>alert('您已成功注销本次登陆！');window.location.href='/index.php';</script>");
}
?>
<!DOCTYPE html>
<html lang="zh">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		
		<title>用户中心 - <?php echo $conf['sitename'];?></title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="default">
		<link rel="stylesheet" type="text/css" href="/assets/gn/css/materialdesignicons.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/gn/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/gn/js/bootstrap-multitabs/multitabs.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/gn/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/gn/css/style.min.css">
	</head>

	<body>
		<div class="lyear-layout-web">
			<div class="lyear-layout-container">
				<!--左侧导航-->
				<aside class="lyear-layout-sidebar">

					<!-- logo -->
					<div id="logo" class="sidebar-header">
						<a href=""><img src="<?php echo $logo1?>" height="150" title="LightYear" alt="LightYear" /></a>
					</div>
					<div class="lyear-layout-sidebar-info lyear-scroll">

						<nav class="sidebar-main">
							<ul class="nav-drawer">
								<li class="nav-item active">
									<a class="multitabs" href="main.php">
										<i class="mdi mdi-home-city-outline fs-22"></i>
										<span>用户中心</span>
									</a>
								</li>
		                   	<li class="nav-item">
									<a class="multitabs" href="set.php">
										<i class="mdi mdi-cow fs-22"></i>
										<span>提交订单</span>
									</a>
								</li>
				
							
			

						<div class="sidebar-footer">
							<p class="copyright">Copyright &copy;  <?php echo $date ?>  . <a target="_blank"
									href=""><?php echo $conf['sitename'];?>.</a> All rights reserved.</p>
						</div>
					</div>

				</aside>
				<!--End 左侧导航-->

				<!--头部信息-->
				<header class="lyear-layout-header">

					<nav class="navbar">

						<div class="navbar-left">
							<div class="lyear-aside-toggler">
								<span class="lyear-toggler-bar"></span>
								<span class="lyear-toggler-bar"></span>
								<span class="lyear-toggler-bar"></span>
							</div>
						</div>

						<ul class="navbar-right d-flex align-items-center">
							<li class="dropdown dropdown-notice">
								<span data-toggle="dropdown" class="icon-item">
									<i class="mdi mdi-bell-outline"></i>
									<span class="badge badge-danger">1</span>
								</span>
								<div class="dropdown-menu dropdown-menu-right">
									<div class="lyear-notifications">

										<div class="lyear-notifications-title clearfix" data-stopPropagation="true"><a
												href="#!" class="float-right">查看全部</a>你有 1 条未读消息</div>
										<div class="lyear-notifications-info lyear-scroll">
											<a href="#!" class="dropdown-item"
												title="关于本系统">emmm</a>
										
										</div>

									</div>
								</div>
							</li>
							<!--切换主题配色-->
							<li class="dropdown dropdown-skin">
								<span data-toggle="dropdown" class="icon-item"><i class="mdi mdi-palette"></i></span>
								<ul class="dropdown-menu dropdown-menu-right" data-stopPropagation="true">
									<li class="drop-title">
										<p>LOGO</p>
									</li>
									<li class="drop-skin-li clearfix">
										<span class="inverse">
											<input type="radio" name="logo_bg" value="default" id="logo_bg_1" checked>
											<label for="logo_bg_1"></label>
										</span>
										<span>
											<input type="radio" name="logo_bg" value="color_2" id="logo_bg_2">
											<label for="logo_bg_2"></label>
										</span>
										<span>
											<input type="radio" name="logo_bg" value="color_3" id="logo_bg_3">
											<label for="logo_bg_3"></label>
										</span>
										<span>
											<input type="radio" name="logo_bg" value="color_4" id="logo_bg_4">
											<label for="logo_bg_4"></label>
										</span>
										<span>
											<input type="radio" name="logo_bg" value="color_5" id="logo_bg_5">
											<label for="logo_bg_5"></label>
										</span>
										<span>
											<input type="radio" name="logo_bg" value="color_6" id="logo_bg_6">
											<label for="logo_bg_6"></label>
										</span>
										<span>
											<input type="radio" name="logo_bg" value="color_7" id="logo_bg_7">
											<label for="logo_bg_7"></label>
										</span>
										<span>
											<input type="radio" name="logo_bg" value="color_8" id="logo_bg_8">
											<label for="logo_bg_8"></label>
										</span>
									</li>
									<li class="drop-title">
										<p>头部</p>
									</li>
									<li class="drop-skin-li clearfix">
										<span class="inverse">
											<input type="radio" name="header_bg" value="default" id="header_bg_1"
												checked>
											<label for="header_bg_1"></label>
										</span>
										<span>
											<input type="radio" name="header_bg" value="color_2" id="header_bg_2">
											<label for="header_bg_2"></label>
										</span>
										<span>
											<input type="radio" name="header_bg" value="color_3" id="header_bg_3">
											<label for="header_bg_3"></label>
										</span>
										<span>
											<input type="radio" name="header_bg" value="color_4" id="header_bg_4">
											<label for="header_bg_4"></label>
										</span>
										<span>
											<input type="radio" name="header_bg" value="color_5" id="header_bg_5">
											<label for="header_bg_5"></label>
										</span>
										<span>
											<input type="radio" name="header_bg" value="color_6" id="header_bg_6">
											<label for="header_bg_6"></label>
										</span>
										<span>
											<input type="radio" name="header_bg" value="color_7" id="header_bg_7">
											<label for="header_bg_7"></label>
										</span>
										<span>
											<input type="radio" name="header_bg" value="color_8" id="header_bg_8">
											<label for="header_bg_8"></label>
										</span>
									</li>
									<li class="drop-title">
										<p>侧边栏</p>
									</li>
									<li class="drop-skin-li clearfix">
										<span class="inverse">
											<input type="radio" name="sidebar_bg" value="default" id="sidebar_bg_1"
												checked>
											<label for="sidebar_bg_1"></label>
										</span>
										<span>
											<input type="radio" name="sidebar_bg" value="color_2" id="sidebar_bg_2">
											<label for="sidebar_bg_2"></label>
										</span>
										<span>
											<input type="radio" name="sidebar_bg" value="color_3" id="sidebar_bg_3">
											<label for="sidebar_bg_3"></label>
										</span>
										<span>
											<input type="radio" name="sidebar_bg" value="color_4" id="sidebar_bg_4">
											<label for="sidebar_bg_4"></label>
										</span>
										<span>
											<input type="radio" name="sidebar_bg" value="color_5" id="sidebar_bg_5">
											<label for="sidebar_bg_5"></label>
										</span>
										<span>
											<input type="radio" name="sidebar_bg" value="color_6" id="sidebar_bg_6">
											<label for="sidebar_bg_6"></label>
										</span>
										<span>
											<input type="radio" name="sidebar_bg" value="color_7" id="sidebar_bg_7">
											<label for="sidebar_bg_7"></label>
										</span>
										<span>
											<input type="radio" name="sidebar_bg" value="color_8" id="sidebar_bg_8">
											<label for="sidebar_bg_8"></label>
										</span>
									</li>
								</ul>
							</li>
							<!--切换主题配色-->
							<li class="dropdown dropdown-profile">
								<a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">
									<img class="img-avatar img-avatar-48 m-r-10" src="<?php echo $logo1?>"
										alt="" />
									
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
			
								
								
									<li class="dropdown-divider"></li>
									<li>
										<a class="dropdown-item" href="index.php?logout"><i
												class="mdi mdi-logout-variant"></i> 退出登录</a>
									</li>
								</ul>
							</li>
						</ul>

					</nav>

				</header>
				<!--End 头部信息-->

				<!--页面主要内容-->
				<main class="lyear-layout-content">
					<div id="iframe-content"></div>
				</main>
				<!--End 页面主要内容-->
			</div>
		</div>

		<script type="text/javascript" src="/assets/gn/js/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/gn/js/popper.min.js"></script>
		<script type="text/javascript" src="/assets/gn/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/assets/gn/js/perfect-scrollbar.min.js"></script>
		<script type="text/javascript" src="/assets/gn/js/bootstrap-multitabs/multitabs.min.js"></script>
		<script type="text/javascript" src="/assets/gn/js/jquery.cookie.min.js"></script>
		<script type="text/javascript" src="/assets/gn/js/index.min.js"></script>
	</body>
</html>