<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Social Engineer</title>
<link rel="stylesheet" type="text/css" href="/social/Public/Css/base.css" />
<script type="text/javascript" src="/social/Public/Js/jquery.js"></script>


</head>

<body>

<h1>Social Engineer</h1>

<block name="script">
<script>
$(function(){
	$('img[title="login"]').click(function(){
		$('form[name="myform"]').submit();
	});
	$('#user-login').ajaxForm(function(d) {   
		if(d.status){
			u.msg(d.info,4,"index.php");
		}else{
			u.msg(d.info,5);  
		}
	}); 
});
</script>





<form method="post" action="<?php echo U('User/on_login');?>" id="user-login" name="myform">
	<label class="control-label">username</label> <input type="text" name="username"></br>
	<label class="control-label">passwd</label> <input type="password" name="password"></br>
	Code: <input type='text' name='code'/><img src="/social/index.php/Public/code" onclick='this.src=this.src+"?"+Math.random()'/></br>
	<img src="/social/Public/Image/b05.gif" title="login" class="submit"/>
</form>



<footer id="footer">
<div class="container">
<div class="row hidden-xs">
  
</div>
<div class="copyright">
Copyright @ 2015-2019  <br><a href="http://www.baidu.com" rel="nofollow"></a>
</div>
   
</div>
</footer>
</body>
</html>