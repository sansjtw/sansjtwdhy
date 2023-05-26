
<?php
$mod='blank';
include("../includes/common.php");
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
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
  
 
 
        <div class="card-body">
          
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>

                  <th>ID</th>
                  <th>目标网站</th>
                  <th>测压者卡密</th>
                  <th>结束时间</th>     
                 
                </tr>
              </thead>
           
                  
 <?php
 $rs=$DB->query("SELECT * FROM lan_log WHERE 1");
while($res = $DB->fetch($rs))
{?>
                     <tbody>
                <tr>
           <td><?php echo $res['id']?></td>
           <td><?php echo $res['url']?></td>
                  <td><?php echo $res['km']?></td>

                  
                  <td><?php echo $res['endtime']?></td>
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