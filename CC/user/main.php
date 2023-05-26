<?php
include("../includes/common.php");
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");


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
  <div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>尊敬的会员,您好
            :</strong><br><?php echo $conf['zxgg']?>
          </div>
          
     <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><?php echo $sitename ?>会员价格:</strong><br> 天卡：<?php echo $conf['tkjg']?><br>周卡：<?php echo $conf['zkjg']?><br>月卡：<?php echo $conf['ykjg']?><br>年卡：<?php echo $conf['nkjg']?><br>永久：<?php echo $conf['yjjg']?>
          </div>      
          
          
          
  <div class="row">
    <div class="col-md-6 col-xl-3">
      <div class="card bg-primary text-white">
        <div class="card-body clearfix">
          <div class="flex-box">
            <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-currency-cny fs-22"></i></span>
            <span class="fs-22 lh-22"><?php if($lan['vip']==null){
            echo "您还未购买会员!";
            }else echo $lan['vip'] ?></span>
          </div>
          <div class="text-right">套餐时间</div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
      <div class="card bg-danger text-white">
        <div class="card-body clearfix">
          <div class="flex-box">
            <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-account fs-22"></i></span>
            <span class="fs-22 lh-22"><?php echo $lan['xc']?></span>
          </div>
          <div class="text-right">您的最大线程</div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
      <div class="card bg-success text-white">
        <div class="card-body clearfix">
          <div class="flex-box">
            <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-arrow-down-bold fs-22"></i></span>
            <span class="fs-22 lh-22"><?php echo $lan['cs']?></span>
          </div>
          <div class="text-right">剩余测压次数</div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
      <div class="card bg-purple text-white">
        <div class="card-body clearfix">
          <div class="flex-box">
            <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-comment-outline fs-22"></i></span>
            <span class="fs-22 lh-22"><?php echo $lan['id']?></span>
          </div>
          <div class="text-right">UID</div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    
    <div class="col-md-6"> 
      <div class="card">
        <div class="card-header">
          <div class="card-title">快速导航</div>
        </div>
        <div class="card-body">
              <div class="form-group">
         
      
      <a class="multitabs"  href="./set.php">       <button type="button" class="btn btn-outline-success" style="width:100px;height:30px;">开始测压</button></a> 
    
   
   
         
     
      
               
                </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6"> 
      <div class="card">
        <div class="card-header">
          <div class="card-title">我的信息</div>
        </div>
        <div class="card-body">
         
<li class="list-group-item">
<h6>最长单次测压时间：<?php echo $lan['cy']?>秒</h6>
</li>
<li class="list-group-item">
<h6>我的线程：<?php echo $lan['xc']?></h6>
</li>
<li class="list-group-item">
<h6>我的次数：<?php echo $lan['cs']?></h6>
</li>
<li class="list-group-item">
<h6>套餐到期时间：<?php if($lan['vip']==null){
            echo "您还未购买会员!";
            }else echo $lan['vip'] ?></h6>
</li>

        </div>
      </div>
    </div>
     
  </div>
  
  
  
  
  
  
  
  
  
  
 
  
  
   
 
    
  
  
  
  
  
  
  
  
  
  
  
  <div class="row">
    
    <div class="col-lg-12">
      <div class="card">
        <header class="card-header"><div class="card-title">日志</div></header>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>网站</th>
                  <th>时间</th>
                  <th>状态</th>
                </tr>
              </thead>
               <tbody>
 <?php   
$rs=$DB->query("SELECT * FROM lan_log where km='{$lan['km']}'      " );
while($res = $DB->fetch($rs)){

if($res['endtime']>$date){
$zt="正在执行";
}else{
$zt="已完成";
}

?>
                   
                <tr>
                  <td><?php echo $res['id']?></td>
                  <td><?php echo $res['url']?></td>
                  <td><?php echo $res['time']?></td>
             <td><?php echo $zt;?>
               </td>
                </tr>
               <?}?>
               
              </tbody>
            </table>
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
</body>
</html>
