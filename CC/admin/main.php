<?php
include("../includes/common.php");
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$km=$DB->count("SELECT count(*) from lan_kms WHERE 1");
$yy=$DB->count("SELECT count(*) from lan_kms WHERE ip is  NULL");

?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title><?php echo $sitename ?></title>
<link rel="icon" href="favicon.ico" type="image/ico">
<meta name="author" content="yinqi">
<link href="/assets/gn/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/gn/css/materialdesignicons.min.css" rel="stylesheet">
<link href="/assets/gn/css/style.min.css" rel="stylesheet">
</head>
  
<body>
<div class="container-fluid p-t-15">

    
    <div class="col-md-6 col-xl-3">
      <div class="card bg-success text-white">
        <div class="card-body clearfix">
          <div class="flex-box">
            <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-arrow-down-bold fs-22"></i></span>
            <span class="fs-22 lh-22"><?php echo $km?>张</span>
          </div>
          <div class="text-right">卡密总数</div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
      <div class="card bg-purple text-white">
        <div class="card-body clearfix">
          <div class="flex-box">
            <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-comment-outline fs-22"></i></span>
            <span class="fs-22 lh-22"><?php echo $yy?>个</span>
          </div>
          <div class="text-right">未激活卡密</div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    
    <div class="col-md-6"> 
      <div class="card">
        <div class="card-header">
          <div class="card-title">每周用户</div>
        </div>
        <div class="card-body">
          <canvas class="js-chartjs-bars"></canvas>
        </div>
      </div>
    </div>
    
    <div class="col-md-6"> 
      <div class="card">
        <div class="card-header">
          <div class="card-title">交易历史记录</div>
        </div>
        <div class="card-body">
          <canvas class="js-chartjs-lines"></canvas>
        </div>
      </div>
    </div>
     
  </div>
  

    
  </div>
  
</div>

<script type="text/javascript" src="/assets/gn/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/popper.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/main.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/Chart.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    var $dashChartBarsCnt  = jQuery( '.js-chartjs-bars' )[0].getContext( '2d' ),
        $dashChartLinesCnt = jQuery( '.js-chartjs-lines' )[0].getContext( '2d' );
    
    var $dashChartBarsData = {
		labels: ['周一', '周二', '周三', '周四', '周五', '周六', '周日'],
		datasets: [
			{
				label: '注册用户',
                borderWidth: 1,
                borderColor: 'rgba(0, 0, 0, 0)',
				backgroundColor: 'rgba(51, 202, 185, 0.5)',
                hoverBackgroundColor: "rgba(51, 202, 185, 0.7)",
                hoverBorderColor: "rgba(0, 0, 0, 0)",
				data: [2500, 1500, 1200, 3200, 4800, 3500, 1500]
			}
		]
	};
    var $dashChartLinesData = {
		labels: ['2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014'],
		datasets: [
			{
				label: '交易资金',
				data: [20, 25, 40, 30, 45, 40, 55, 40, 48, 40, 42, 50],
				borderColor: '#358ed7',
				backgroundColor: 'rgba(53, 142, 215, 0.175)',
                borderWidth: 1,
                fill: false,
                lineTension: 0.5
			}
		]
	};
    
    new Chart($dashChartBarsCnt, {
        type: 'bar',
        data: $dashChartBarsData
    });
    
    var myLineChart = new Chart($dashChartLinesCnt, {
        type: 'line',
        data: $dashChartLinesData,
    });
});
</script>
</body>
</html>
