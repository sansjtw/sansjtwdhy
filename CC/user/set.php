<?php
include("../includes/common.php");
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>提交订单</title>
<link rel="icon" href="favicon.ico" type="image/ico">

<meta name="author" content="yinqi">
<link href="/assets/gn/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/gn/css/materialdesignicons.min.css" rel="stylesheet">
<link href="/assets/gn/css/style.min.css" rel="stylesheet">
</head>
  
<body>
<div class="container-fluid p-t-15">
  
  <div class="row">
    
    <div class="col-lg-12">
      <div class="card">
       
        <div class="tab-content">
          <div class="tab-pane active">
            
            
            
            
            
            <div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>公告：</strong><?php echo $conf['cygg'] ?>
          </div>
            
            
            <form action="#!" method="post" name="edit-form" class="edit-form">
                
                
                
                
          
  
             
  
                
                
                
              <div class="form-group">
                <label for="web_site_title">网站域名</label>
                <input class="form-control" type="text" name="url" id="url"  value="" placeholder="带http:///">
              </div>
                 <div class="form-group">
                <label for="web_site_title">网站端口</label>
                <input class="form-control" type="text" name="dk" id="dk"  value="" placeholder="默认是80">
              </div>
                   <div class="form-group">
                <label for="web_site_title">攻击模式</label>
                <input class="form-control" type="text" name="ms" id="ms"  value="<?php echo $conf['ccms']?>">
              </div>
            
             <div class="form-group">
                <label for="web_site_title">执行时间(单位:秒)</label>
                  <input name="time" id="time" class="form-control"  placeholder="填写数字单位是秒"
                  > 
              </div>
             
            
          
              <div class="form-group">
                  <center>
                <button type="button" name="type"  onclick="sub()"  class="btn btn-primary m-r-5">开 始 测 压 </button>
                                 </center>

              </div>
            </form>
            
          </div>
        </div>

      </div>
    </div>
        
  </div>
  
</div>

<script type="text/javascript" src="/assets/gn/js/jquery.min.js?rev=1.0"></script>
<script type="text/javascript" src="/assets/gn/js/bootstrap.min.js?rev=1.0"></script>
<!-- <script type="text/javascript" src="/assets/LightYear/js/lightyear.js?rev=1.0"></script> -->
<script type="text/javascript" src="/assets/gn/js/main.min.js?rev=1.0"></script>
<script src="<?php echo $cdnpublic;?>jquery/1.12.4/jquery.min.js?rev=1.0"></script>
<script src="<?php echo $cdnpublic;?>layer/2.3/layer.js?rev=1.0"></script>
<script>
function sub() {
    var url=$("#url").val();
    var time=$("#time").val();
   var dk=$("#dk").val();
    var ms=$("#ms").val();
    var ii = layer.msg('正在提交中...', {
                 icon: 16,
                 time: 2000000
             });
    $.ajax({
        type: "POST",
        url: "./ajax.php?act=cc",
        data: {url:url,time:time,dk:dk,ms:ms},
        dataType: "json",
       success: function (data) {
            layer.close(ii);
            if (data.code == 'ok') {
                layer.alert(data.msg);
            } else {
                layer.alert(data.msg);
            }
        },
        error: function(data){
            layer.close(ii);
            layer.msg('服务器错误', {icon: 2, time: 1500});
            return false;
        }
    });
}
</script>
</body>
</html>
