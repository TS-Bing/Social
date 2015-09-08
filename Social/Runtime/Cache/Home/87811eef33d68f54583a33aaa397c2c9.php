<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>Social Engineer</title>
<link rel="stylesheet" type="text/css" href="/social/Public/Css/base.css" />
<script type="text/javascript" src="/social/Public/Js/jquery.js"></script>

<script>
$(function(){
	$('img[title="login"]').click(function(){
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


</div>
</br>

<div class="container">

<form method="post" action="<?php echo U('User/on_login');?>" id="user-login" name="myform">
	用户名:<input type="text" name="username"></br>
	密      码:<input type="password" name="password"></br>
	验证码: <input type='text' name='code'/><img src="/social/index.php/Public/code" onclick='this.src=this.src+"?"+Math.random()'/></br>
	<img src="/social/Public/Image/b05.gif" title="login" class="submit"/>
</form>

</div>
</br>


<div class="copyright" align="center">
Copyright @ 2015-2019
</div>

</body>
</html>