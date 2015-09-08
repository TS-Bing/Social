<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>Social Engineer</title>
<link rel="stylesheet" type="text/css" href="/social/Public/Css/base.css" />
<script type="text/javascript" src="/social/Public/Js/jquery.js"></script>

<script>
$(function(){
	$('img[title="search"]').click(function(){
		$('form[name="myform"]').submit();
	});
});

</script>

</head>

<body>
<div class="header">

<h1>Social Engineer</h1>

</div>
</br>

<div class="nav">

<div class="login">
<label class="nav-login">WelCome!!! 用户: <?php echo ($data); ?> ...</label><?php $localtime=date('y年-m-d H:i:s',time());echo $localtime; ?></br><a href="/social/index.php/User/yaoqingma">生成邀请码</a>..<a href="/social/index.php/User/logout">退出</a></br>
</div>
<div  class="search">
<form enctype="multipart/form-data" action="" method="get" name="myform">
		<select name="C1" class="isselect"> 
			<option value="l1" selected="selected">模糊搜索</option> 
			<option value="k1">精确搜索</option> 
		</select>
		
		<select name="C2" class="isselect"> 
			<option value="nick" selected="selected">昵称</option>
			<option value="name">姓名</option>
			<option value="mail">邮件</option> 
			<option value="card">省份证</option> 
			<option value="phone">电话</option> 
			<option value="site">来源</option> 
		</select> 
		
		<input type="text" value="请输入关键字" name="C3" class="input1" />
		
		<img src="/social/Public/Image/b08.gif" title="search" /> 
		</form>

</div>

</div>
</br>

<div class="container">

	<table border="1" width="800" >
		<tr>
			<th>序列</th>
			<th>昵称</th>
			<th>姓名</th>
			<th>密码</th>
			<th>Salt</th>
			
			<th>电子邮件</th>
			<th>身份证</th>
			<th>电话</th>
			<th>注册IP</th>
			<th>地址</th>
			<th>来源站点</th>
		</tr>
		<?php if(is_array($test)): foreach($test as $key=>$co): ?><tr align="center">
			<td><?php echo ($stat++); ?></td>
			<td><?php echo ($co["nick"]); ?></td>
			<td><?php echo ($co["name"]); ?></td>
			<td><?php echo ($co["pwd"]); ?></td>
			<td><?php echo ($co["salt"]); ?></td>
			
			<td><?php echo ($co["mail"]); ?></td>
			<td><?php echo ($co["card"]); ?></td>
			<td><?php echo ($co["phone"]); ?></td>
			<td><?php echo ($co["ip"]); ?></td>
			<td><?php echo ($co["address"]); ?></td>
			<td><?php echo ($co["site"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</table></br>
	<p><?php echo ($page); ?></p>默认页面显示:<?php echo ($count); ?>条记录

</div>
</br>


<div class="copyright" align="center">
Copyright @ 2015-2019
</div>

</body>
</html>