<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>Social Engineer</title>
<link rel="stylesheet" type="text/css" href="/social/Public/Css/base.css" />
<script type="text/javascript" src="/social/Public/Js/jquery.js"></script>


</head>

<body>
<div class="header">


</div>
</br>

<div class="nav">


</div>
</br>

<div class="container">

	<form action="/social/index.php/User/update" method="post">
		<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
		用户名:<input type="text" name="nick" value="<?php echo ($data["nick"]); ?>" disabled="disabled"/></br>
		更新密码:<input type="text" name="passwd" value="<?php echo ($data["pwd"]); ?>" /></br>
		</br><input type="submit" value="修改"/>		
	</form>

</div>
</br>


<div class="copyright" align="center">
Copyright @ 2015-2019
</div>

</body>
</html>