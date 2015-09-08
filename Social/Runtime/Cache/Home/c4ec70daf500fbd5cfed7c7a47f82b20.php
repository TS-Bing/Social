<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>Social Engineer</title>
<link rel="stylesheet" type="text/css" href="/social/Public/Css/base.css" />
<script type="text/javascript" src="/social/Public/Js/jquery.js"></script>

<script>
$(function(){
	var error = new Array();
	$('input[name="username"]').blur(function(){
		var username = $(this).val();
		$.get('/social/index.php/User/CheckName',{'username':username},function(data){
			if(data=="you"){
				error["username"]= 1;
				$('input[name="username"]').after('<p id="umessage" style="color:green">用户已注册</p>');
			}else{
				error["username"]= 0;
				$('#umessage').remove();
			}
		})
	});
	$('img[title="reg"]').click(function(){
		if(error["username"] == 1){
			return false;
		}else{
			$('form[name="myform"]').submit();
		}
		
	});
	
});
</script>

</head>

<body>
<div class="header">

<h1>Social Engineer---reg</h1>

</div>
</br>

<div class="nav">


</div>
</br>

<div class="container">

<form method="post" action="<?php echo U('User/on_reg');?>" name="myform" >
	<label class="control-label">邀请码</label> <input type="text" name="yqmvf"></br>
	<label class="control-label">用户名</label> <input type="text" name="username"></br>
	<label class="control-label">邮箱</label> <input type="text" name="email"></br>
	<label class="control-label">密码</label> <input type="password" name="password"></br>
	<label class="control-label">确认密码</label> <input type="password" name="password2"></br>
	验证码: <input type='text' name='code'/><img src="/social/index.php/Public/code" onclick='this.src=this.src+"?"+Math.random()'/></br>
	<img src="/social/Public/Image/b04.gif" title="reg" class="submit"/>
</form>

</div>
</br>


<div class="copyright" align="center">
Copyright @ 2015-2019
</div>

</body>
</html>