<?php
include("../includes/common.php");
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$do=$_GET["do"];
?>

<?php
if($do=="tj"){
echo '<link href="/assets/gn/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/gn/css/materialdesignicons.min.css" rel="stylesheet">
<!--标签插件-->
<link rel="stylesheet" href="/assets/gn/js/jquery-tagsinput/jquery.tagsinput.min.css">
<link href="/assets/gn/css/style.min.css" rel="stylesheet">';

$sj=$_POST['sj'];
$cy=$_POST['cy'];
$cs=$_POST['cs'];
$xc=$_POST['xc'];
$sl=$_POST['s'];
$vip =  date("Y-m-d H:i:s",strtotime("$date +".$sj." day"));
for ($i = 0; $i < $sl; $i++) {
     $km=get_sz();
     $sql = "insert into `lan_kms` (`km`,`vip`,`cy`,`cs`,`xc`) values ('".$km."','".$vip."','".$cy."','".$cs."','".$xc."')";
     $DB->query($sql);
     if($km!=""){
  echo '  
              <div class="form-group">
              
                <textarea class="form-control"rows="5" name="description" readonly="readonly"   >'.$km.'</textarea>
         
              </div>
              '; 
}
}
}
?>
              
              
              
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title><?php echo $conf['sitename'] ?></title>
<link rel="icon" href="favicon.ico" type="image/ico">
<meta name="author" content="yinqi">
<link href="/assets/gn/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/gn/css/materialdesignicons.min.css" rel="stylesheet">
<!--标签插件-->
<link rel="stylesheet" href="/assets/gn/js/jquery-tagsinput/jquery.tagsinput.min.css">
<link href="/assets/gn/css/style.min.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid p-t-15">
  
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          
          <form action="addkm.php?do=tj" method="post" class="row">
            <div class="form-group col-md-12">
              <label for="type">套餐时间</label>
              <div class="form-controls">
                <select name="sj" class="form-control" id="type">
                  <option value="1">天卡</option>
                  <option value="7">周卡</option>
                  <option value="30">月卡</option>
                  <option value="365">年卡</option>
                  <option value="99999">无限卡</option>
                </select>
              </div>
            </div>
                        <div class="form-group col-md-12">
              <label for="title">最大支持线程</label>
              <input type="text" class="form-control" id="title" name="xc" value="1"  />
            </div>
             <div class="form-group col-md-12">
              <label for="title">单次最长测压时间【单位：秒】</label>
              <input type="text" class="form-control" id="title" name="cy" value="30"  />
            </div>
             <div class="form-group col-md-12">
              <label for="title">测压次数</label>
              <input type="text" class="form-control" id="title" name="cs" value="5"  />
            </div>
            <div class="form-group col-md-12">
              <label for="title">数量</label>
              <input type="text" class="form-control" id="title" name="s" value="5"  />
            </div>
        
            <div class="form-group col-md-12">
              <button type="submit" class="btn btn-primary" target-form="add-form">确 定</button>
              <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
            </div>
          </form>
 
        </div>
      </div>
    </div>
    
  </div>
  
</div>
<script type="text/javascript" src="/assets/gn/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/perfect-scrollbar.min.js"></script>
<!--标签插件-->
<script src="/assets/gn/js/jquery-tagsinput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/main.min.js"></script>
</body>
</html>