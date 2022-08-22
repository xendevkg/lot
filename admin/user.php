<?php 
include "function.php"; 
	$error='';
	if(isset($_POST['login'])) {

	$username = mysql_real_escape_string(stripslashes(strip_tags($_POST['username'])));

	$password = mysql_real_escape_string(stripslashes(strip_tags($_POST['password'])));

	if (empty($username) || empty($password)) {

		$error = "Please enter username and password!";

	} /* else if (empty($_POST['security_code'] )) {

		$error = "Please enter security code!";

	} else if ($_POST['security_code'] != $_SESSION['security_code'] ) {

		$error = "Incorrect security code!";

	} */ else {

		$sql2 = mysql_query("SELECT * from tb_user where username = '$username' AND password1 = '$password'");

		if (mysql_num_rows($sql2) > 0) {
		
		$login = mysql_fetch_array($sql2);

		$_SESSION['userid'] = $login['username']; 

		$update = mysql_query("UPDATE tb_user set last_login = NOW()");

		header('Location: '.$url.'index.php');

		exit;

		} else {

		$error = "Wrong username or password!";

		}

   }

} 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Login Administrator</title>

<style>

body {

	width:100%;

	height:100%;

	overflow:hidden;

	background:#5472B0;

	margin:auto;

	color:#FFFFFF;

	font-family:Arial, Helvetica, sans-serif;

	font-size:13px;



}

.login {

	width:732px;

	height:450px;

	background:url(<?php echo $url; ?>/images/login.png) no-repeat center;

	left:50%;

	top:50%;

	margin-left:-366px;

	margin-top:-225px;

	position:absolute;

}

.flogin {

	width:307px;

	height:166px;

	float:right;

	margin-top:160px;

	margin-right:60px;

	border:1px solid #5776B4;

}

input[type=text],  input[type=password] {

	border:thin solid #FFF;

	background-color:transparent;

	color:#FFFFFF;

}

</style>

</head>



<body>

<div class="login">

<div class="flogin">

<br />

<form action="" method="post" enctype="multipart/form-data" name="frmlogin" autocomplete="off">

<table width="85%" border="0" cellspacing="1" cellpadding="5" align="center">

  <tr>

    <td>Username</td>

    <td align="right"><label for="username"></label>

      <input type="text" name="username" id="username" /></td>

  </tr>

  <tr>

    <td>Password</td>

    <td align="right"><label for="password"></label>

      <input type="password" name="password" id="password" /></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td align="right"><label for="login"></label>

      <input type="submit" name="login" value="" id="login" style="background:url(<?php echo $url; ?>/images/btlogin.png) no-repeat; width:67px; height:28px; border:none; cursor:pointer;" /></td>



</table>

<p align="center"><small><font color="#FF0000"><?php echo $error; ?></font></small></p>

</form>

</div>

</div>

</body>

</html>

