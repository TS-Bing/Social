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
<label class="nav-login">WelCome!!! username: <?php echo ($data); ?> .....</label><a href="/social/index.php/User/logout">logout</a></br>
</div>
<div  class="search">
<form enctype="multipart/form-data" action="" method="post" name="myform">
		<select name="C1" class="isselect"> 
			<option value="l1" selected="selected">like</option> 
			<option value="k1">confirm</option> 
		</select>
		
		<select name="C2" class="isselect"> 
			<option value="nick" selected="selected">nick</option>
			<option value="name">name</option>
			<option value="mail">email</option> 
			<option value="card">IDcard</option> 
			<option value="phone">phone</option> 
			<option value="site">site</option> 
		</select> 
		
		<input type="text" value="please Mrs input key!!" name="C3" class="input1" />
		
		<img src="/social/Public/Image/b08.gif" title="search" /> 
		</form>

</div>

</div>
</br>

<div class="container">

	<table border="1" width="800" >
		<tr>
			<th>id</th>
			<th>nick</th>
			<th>name</th>
			<th>pass</th>
			<th>gpass</th>
			<th>email</th>
			<th>IDcard</th>
			<th>Phone</th>
			<th>Reg IP</th>
			<th>Address</th>
			<th>Site</th>
		</tr>
		<?php if(is_array($test)): foreach($test as $key=>$co): ?><tr align="center">
			<td><?php echo ($co["id"]); ?></td>
			<td><?php echo ($co["nick"]); ?></td>
			<td><?php echo ($co["name"]); ?></td>
			<td><?php echo ($co["pwd"]); ?></td>
			<td><?php echo ($co["gpwd"]); ?></td>
			<td><?php echo ($co["mail"]); ?></td>
			<td><?php echo ($co["card"]); ?></td>
			<td><?php echo ($co["phone"]); ?></td>
			<td><?php echo ($co["ip"]); ?></td>
			<td><?php echo ($co["address"]); ?></td>
			<td><?php echo ($co["site"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</table></br>
	<p><?php echo ($page); ?></p> count data:<?php echo ($count); ?>

</div>
</br>


<div class="copyright">
Copyright @ 2015-2019  <br><a href="http://www.baidu.com" rel="nofollow"></a>
</div>

</body>
</html>