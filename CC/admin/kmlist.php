
<?php
$mod='blank';
include("../includes/common.php");
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$do=$_GET['do'];
$id=$_GET['id'];
if($do=='del'){
    $sql="DELETE FROM lan_kms WHERE id='$id' limit 1";
    if($DB->query($sql)){
           	exit("<script language='javascript'>alert('删除成功！');window.location.href='./kmlist.php';</script>");
    }
}
if($do=='delqb'){
      $sql="DELETE FROM lan_kms WHERE syzmz is not null ";
    if($DB->query($sql)){
           	exit("<script language='javascript'>alert('一键删除成功！');window.location.href='./kmlist.php';</script>");
    }
}
    



?>





<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title><?php echo $conf['sitename']?></title>
<meta name="author" content="yinqi">
<link href="/assets/gn/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/gn/css/materialdesignicons.min.css" rel="stylesheet">
<link href="/assets/gn/js/jquery-confirm/jquery-confirm.min.css" rel="stylesheet">
<link href="/assets/gn/css/animate.min.css" rel="stylesheet">
<link href="/assets/gn/css/style.min.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid p-t-15">
  
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-toolbar d-flex flex-column flex-md-row">
          <div class="toolbar-btn-action">
            <a class="btn btn-primary m-r-5" href="addkm.php"><i class="mdi mdi-plus"></i> 新增</a>
      
            <a class="btn btn-danger" href="kmlist.php?do=delqb"><i class="mdi mdi-window-close"></i> 一键删除已用卡密</a>
          </div>  
          <form class="search-bar ml-md-auto" method="get" action="#!" role="form">
            <input type="hidden" name="search_field" id="search-field" value="title" />
            <div class="input-group ml-md-auto">
              <div class="input-group-prepend">
             
                <div class="dropdown-menu" style="">
              
                </div>
              </div>
              <input type="text" class="form-control" name="keyword" placeholder="请输入名称">
            </div>
          </form>
        </div>
 
        <div class="card-body">
          
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="check-all">
                      <label class="custom-control-label" for="check-all"></label>
                    </div>
                  </th>
                  <th>ID</th>
                  <th>卡密</th>
                  <th>套餐到期时间</th>
                  
                  <th>登录IP</th>  
                                    <th>所剩次数</th>        
                                     <th>最大线程</th>  
                                      <th>单次最大测压分钟</th>  
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
           
                  
 <?php
 $rs=$DB->query("SELECT * FROM lan_kms WHERE 1");
while($res = $DB->fetch($rs))
{
if($res['ip']==NULL){
$zt="未激活";}else{$zt="已激活";} ?>
                     <tbody>
                <tr>
                  <td>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input ids" name="ids[]" value="<?php echo $res['id']?>" id="ids-<?php echo $res['id']?>">
                      <label class="custom-control-label" for="ids-<?php echo $res['id']?>"></label>
                    </div>
                  </td>
                  <td><?php echo $res['id']?></td>
                  <td><?php echo $res['km']?></td>
                  <td>
                  <?php echo $res['vip'] ?>
                  </td>
                  
                  <td><?php echo $res['ip']?></td>
              <td>  <?php echo $res['cs']?></td>
              <td>  <?php echo $res['xc']?></td>
              <td>  <?php echo $res['cy']?></td>
             
                  
                  <td><font class="text-success"><?php echo $zt ?></font></td>
                  <td>
                    <div class="btn-group">
                            <a class="btn btn-xs btn-default ajax-get confirm" href="kmlist.php?do=del&id=<?php echo $res['id'] ?>" title="" data-toggle="tooltip" data-original-title="删除"><i class="mdi mdi-window-close"></i></a>
                    </div>
                  </td>
                </tr>   
            <?  }  ?>            
              </tbody>
            </table>
          </div>
          
          
 
        </div>
      </div>
    </div>
       
<script type="text/javascript" src="/assets/gn/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/popper.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/lyear-loading.js"></script>
<script type="text/javascript" src="/assets/gn/js/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/jquery-confirm/jquery-confirm.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/main.min.js"></script>
</body>
</html>