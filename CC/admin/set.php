<?php
include "../includes/common.php";
$do=$_GET["do"];
if ($islogin != 1) {
	exit("<script language='javascript'>window.location.href='./login.php';</script>");
}
?>
<?php
if($do=="xxxga"){
$sitename=$_POST["sitename"];
$keywords=$_POST["keywords"];
$description=$_POST["description"];
$kfqq=$_POST["kfqq"];
saveSetting("sitename",$sitename);
saveSetting("keywords",$keywords);
saveSetting("description",$description);
saveSetting("kfqq",$kfqq);

	$ad = $CACHE->clear();
	if ($ad) {
		exit("<script language='javascript'>alert('修改成功，已自动反回');history.go(-1);</script>");
	} else {
		exit("<script language='javascript'>alert('修改失败，请稍后重试');history.go(-1);</script>");
	}

}
if($do=="jgxg"){
$tk=$_POST["tkjg"];
$zk=$_POST["zkjg"];
$yk=$_POST["ykjg"];
$nk=$_POST["nkjg"];
$yj=$_POST["yjkjg"];
saveSetting("tkjg",$tk);
saveSetting("zkjg",$zk);
saveSetting("ykjg",$yk);
saveSetting("nkjg",$nk);
saveSetting("yjjg",$yj);
	$ad = $CACHE->clear();
	if ($ad) {
		exit("<script language='javascript'>alert('修改成功，已自动反回');history.go(-1);</script>");
	} else {
		exit("<script language='javascript'>alert('修改失败，请稍后重试');history.go(-1);</script>");
	}

}
if($do=="mbxg"){
$template=$_POST["template"];
$mbkg=$_POST["mbkg"];

saveSetting("template",$template);
saveSetting("mbkg",$mbkg);
	$ad = $CACHE->clear();
	if ($ad) {
		exit("<script language='javascript'>alert('修改成功，已自动反回');history.go(-1);</script>");
	} else {
		exit("<script language='javascript'>alert('修改失败，请稍后重试');history.go(-1);</script>");
	}

}


if($do=="hzxg"){
$qtgg=$_POST["qtgg"];
$zxgg=$_POST["zxgg"];
$cygg=$_POST["cygg"];
$dip=$_POST["dip"];
$ccapi=$_POST["ccapi"];
$ccms=$_POST["ccms"];
saveSetting("qtgg",$qtgg);
saveSetting("zxgg",$zxgg);
saveSetting("cygg",$cygg);
saveSetting("dip",$dip);
saveSetting("ccapi",$ccapi);
saveSetting("ccms",$ccms);

	$ad = $CACHE->clear();
	if ($ad) {
		exit("<script language='javascript'>alert('修改成功，已自动反回');history.go(-1);</script>");
	} else {
		exit("<script language='javascript'>alert('修改失败，请稍后重试');history.go(-1);</script>");
	}

}

if($do=="ydsz"){
    $ydtx=$_POST["ydtx"];
     $ydurl=$_POST["ydurl"];
    saveSetting("ydtx",$ydtx);
    saveSetting("ydurl",$ydurl);
    	$ad = $CACHE->clear();
    	if ($ad) {
		exit("<script language='javascript'>alert('修改成功！');history.go(-1);</script>");
	} else {
		exit("<script language='javascript'>alert('修改失败，请稍后重试');history.go(-1);</script>");
	}	
}
if($do=="mmxg"){
$zh=$_POST["zh"];
$ymm=$_POST["ymm"];
$mm=$_POST["mm"];
if ($ymm!=$conf['admin_pwd']) {
		exit("<script language='javascript'>alert('原密码输入错误，修改失败');history.go(-1);</script>");
	}
saveSetting("admin_user",$zh);
saveSetting("admin_pwd",$mm);


	$ad = $CACHE->clear();
	if ($ad) {
		exit("<script language='javascript'>alert('修改成功，已自动反回');history.go(-1);</script>");
	} else {
		exit("<script language='javascript'>alert('修改失败，请稍后重试');history.go(-1);</script>");
	}

}


?>


<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title><?php echo $conf['sitename']?></title>

<link href="/assets/gn/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/gn/css/materialdesignicons.min.css" rel="stylesheet">
<link href="/assets/gn/css/style.min.css" rel="stylesheet">
</head>
  
<body>
<div class="container-fluid p-t-15">
  
  <div class="row">
    
    <div class="col-lg-12">
      <div class="card">
        
        <?php if($do=="xxxg"){?>
        <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
          <li class="nav-item"> <a href="set.php?do=xxxg" class="nav-link active">基本</a> </li>
          <li class="nav-item"> <a href="set.php?do=jg" class="nav-link">价格</a> </li>
          <li class="nav-item"> <a href="set.php?do=mb" class="nav-link">模板</a> </li>
              <li class="nav-item"> <a href="set.php?do=hzgg" class="nav-link">公告</a> </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active">
            
            <form action="set.php?do=xxxga" method="post" name="edit-form" class="edit-form">
              <div class="form-group">
                <label for="web_site_title">网站名称</label>
                <input class="form-control" type="text"name="sitename" value="<?php echo $conf['sitename']?>" placeholder="">
                                            </div>
             
              <div class="form-group">
                <label for="web_site_keywords">站点关键词</label>
                <input class="form-control" type="text" name="keywords" value="<?php echo $conf['keywords']?>" >
                
              </div>
              <div class="form-group">
                <label for="web_site_description">站点描述</label>
                <textarea class="form-control"rows="5" name="description"><?php echo $conf['description']?></textarea>
         
              </div>
              <div class="form-group">
                <label for="web_site_copyright">站长QQ</label>
                <input class="form-control" type="text"  name="kfqq" value="<?php echo $conf['kfqq'] ?>">
                
              </div>
              
              <div class="form-group">
                <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
              </div>
            </form>       
          </div>
        </div>
      </div>
    </div>        
  </div>  
</div>
 <?}?>
 
     <?php if($do=="jg"){?>
     <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
           <li class="nav-item"> <a href="set.php?do=xxxg" class="nav-link ">基本</a> </li>
            <li class="nav-item"> <a href="set.php?do=jg" class="nav-link active">价格</a> </li>
        
 
          <li class="nav-item"> <a href="set.php?do=mb" class="nav-link">模板</a> </li>
           <li class="nav-item"> <a href="set.php?do=hzgg" class="nav-link">公告</a> </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active">
            
            <form action="set.php?do=jgxg" method="post" name="edit-form" class="edit-form">
              <div class="form-group">
                <label for="web_site_title">天卡价格</label>
                <input class="form-control" type="text"name="tkjg" value="<?php echo $conf['tkjg']?>" placeholder="">
                                            </div>
             
              <div class="form-group">
                <label for="web_site_keywords">周卡价格</label>
                <input class="form-control" type="text" name="zkjg" value="<?php echo $conf['zkjg']?>" >
                
              </div>
           
             <div class="form-group">
                <label for="web_site_keywords">月卡价格</label>
                <input class="form-control" type="text" name="ykjg" value="<?php echo $conf['ykjg']?>" >
                
              </div>  <div class="form-group">
                <label for="web_site_keywords">年卡价格</label>
                <input class="form-control" type="text" name="nkjg" value="<?php echo $conf['nkjg']?>" >
                
              </div>
               </div>  <div class="form-group">
                <label for="web_site_keywords">永久卡价格</label>
                <input class="form-control" type="text" name="yjkjg" value="<?php echo $conf['yjjg']?>" >
                
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
              </div>
            </form>       
          </div>
        </div>
      </div>
    </div>        
  </div>  
</div>
 <?}?>
 
    <?php if($do=="mb"){?>
     <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
           <li class="nav-item"> <a href="set.php?do=xxxg" class="nav-link ">基本</a> </li>
            <li class="nav-item"> <a href="set.php?do=jg" class="nav-link">价格</a> </li>

          <li class="nav-item"> <a href="set.php?do=mb" class="nav-link active">模板</a> </li>
           <li class="nav-item"> <a href="set.php?do=hzgg" class="nav-link">公告</a> </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active">
            
            <form action="set.php?do=mbxg" method="post" name="edit-form" class="edit-form">
              <div class="form-group">
             
              <div class="form-group">
                <label for="web_site_keywords">前台模板</label>

                <div class="">  <select name="template" class="form-control" default="<?php echo $conf['template'];?>">
      <option value="default">初始模板</option>

      </select></div>
              </div>
           
              <div class="form-group">
                <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
              </div>
            </form>       
          </div>
        </div>
      </div>
    </div>        
  </div>  
</div>
 <?}?>
 
  <?php if($do=="hzgg"){?>
     <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
           <li class="nav-item"> <a href="set.php?do=xxxg" class="nav-link ">基本</a> </li>
            <li class="nav-item"> <a href="set.php?do=jg" class="nav-link">价格</a> </li>
           <li class="nav-item"> <a href="set.php?do=mb" class="nav-link">模板</a> </li>
            <li class="nav-item"> <a href="set.php?do=hzgg" class="nav-link active">公告</a> </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active">
            
            <form action="set.php?do=hzxg" method="post" name="edit-form" class="edit-form">
             <div class="form-group">
                <label for="web_site_keywords">前台模板公告</label>
                
                <textarea class="form-control"rows="5" name="qtgg"><?php echo $conf['qtgg']?></textarea>
              </div>
           
             <div class="form-group">
                <label for="web_site_keywords">用户中心公告</label>
               <textarea class="form-control"rows="5" name="zxgg"><?php echo $conf['zxgg']?></textarea>
                
              </div>  <div class="form-group">
                <label for="web_site_keywords">测压页面公告</label>
                <textarea class="form-control"rows="5" name="cygg"><?php echo $conf['cygg']?></textarea>
                
              </div>
                <div class="form-group">
                <label for="web_site_keywords">默认CC模式</label>
                <input class="form-control" type="text" name="ccms" value="<?php echo $conf['ccms']?>" >
                
              </div>
              <div class="form-group">
                <label for="web_site_keywords">对接CCapi</label>
                <input class="form-control" type="text" name="ccapi" value="<?php echo $conf['ccapi']?>" >
                
              </div>
              <small class="help-block"><code>替换字符:
目标网站：[目标网站] 时间：[时间] 端口：[端口] 模式：[模式]</code></small><br>
               </div>  <div class="form-group">
                <label for="web_site_keywords">单IP使用</label>

                <div class="">  <select name="dip" class="form-control">
        <?php if($conf['dip']==1){?>
      <option value="1">开启</option>
<option value="0">关闭</option>
<?}?>  <?php
if($conf['dip']==0){?>
<option value="0">关闭</option>
  <option value="1">开启</option>
<?}?>
      </select></div>
              </div>
           
              <div class="form-group">
                <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
              </div>
            </form>       
          </div>
        </div>
      </div>
    </div>        
  </div>  
</div>
 <?}?>
   <?php if($do=="zzmm"){?>
    
        <div class="tab-content">
          <div class="tab-pane active">
            
            <form action="set.php?do=mmxg" method="post" name="edit-form" class="edit-form">
              
           
             <div class="form-group">
                <label for="web_site_keywords">更改账号</label>
                <input class="form-control" type="text" name="zh"  >
                
              </div>  <div class="form-group">
                <label for="web_site_keywords">原先密码</label>
                <input class="form-control" type="text" name="ymm"  >
                
              </div>
               </div>  <div class="form-group">
                <label for="web_site_keywords">更改密码</label>
                <input class="form-control" type="text" name="mm">
                
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
              </div>
            </form>       
          </div>
        </div>
      </div>
    </div>        
  </div>  
</div>
 <?}?>
 
<script type="text/javascript" src="/assets/gn/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/popper.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/gn/js/main.min.js"></script>
</body>
</html>