<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
</head>
<body>
	<h1>注册页</h1>
	<hr>
	<form action="<?php echo U('doRegister');?>" method='post'>
	<table>
		<tr>
			<td>用户名：</td>
			<td>
				<input type="text" name='name'>
			</td>
		</tr>
		<tr>
			<td>密　码：</td>
			<td>
				<input type="password" name='password'>
			</td>
		</tr>
		<tr>
			<td>确　认：</td>
			<td>
				<input type="password" name='repassword'>
			</td>
		</tr>
		<tr>
			<td>邮　箱：</td>
			<td>
				<input type="text" name='email'>
			</td>
		</tr>
		<tr>
			<td>验证码：</td>
			<td>
				<input type="text" name='verify'>
				<img src="<?php echo U('verify');?>" alt="验证码" onclick='this.src = this.src+"?"+Math.random()'>
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<input type="submit" value="注册">
			</td>
		</tr>
	</table>
	</form>

</body>
</html>