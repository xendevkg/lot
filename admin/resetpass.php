<?php 
	include "../connect-db.php";
	if (!isset($_SESSION['userid'])) {
	header('Location: user.php');
	exit;
	}
	$pro = mysql_query("SELECT * from tb_user where username='".$_SESSION['userid']."'");
	$u = mysql_fetch_array($pro);
?>
<form action="" method="post" enctype="multipart/form-data" name="frmadmin">
<table width="40%">
	<tr>
		<td align="left" valign="top" width="50%">
			<table>
				<tr>
					<td colspan="3"><h2><strong>Ubah Username</strong></h2></td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><label for="username"></label><input type="hidden" name="idp" value="<?php echo $u['user_id']; ?>" /><input name="username" class="field" type="text" id="username" size="20" value="<?php echo $u['username']; ?>" ></td>
				</tr>
				<tr>
					<td colspan="3" align="right"><input name="save" type="submit" id="save" value="Update Username"></td>
				</tr>
			</table>
		</td>
		<td align="right" width="50%">
			<table>
				<tr>
					<td colspan="3"><h2><strong>Ubah Password</strong></h2></td>
				</tr>
				<tr>
					<td>Password Lama</td>
					<td>:</td>
					<td><input name="old" class="field" type="text" id="old" size="20" value="<?php echo $u['password1']; ?>"></td>
				</tr>
				<tr>
					<td>Password Baru</td>
					<td>:</td>
					<td><input name="new" class="field" type="password" id="new" size="20"></td>
				</tr>
				<tr>
					<td>Verify Password</td>
					<td>:</td>
					<td><input name="vnew" class="field" type="password" id="vnew" size="20"></td>
				</tr>
				<tr>
					<td colspan="3" align="right"><label for="button"></label><input name="save2" class="button" type="submit" id="save2" value="Update Password"></td>
				</tr>
			</table>
		</td>
	</tr>	
</table>		
</form>
<?php	
if (isset($_POST['save'])) {
	$idp = $_POST['idp'];
	$nama = $_POST['username'];
	$im = mysql_fetch_array(mysql_query("SELECT * from tb_user where user_id='$idp'"));
	$up = mysql_query("UPDATE tb_user set username='$nama', nama='$nama2' where user_id='$idp'");
	$_SESSION['userid'] = $nama;
	header ('Location:index.php?v=ubah');
	}
if (isset($_POST['save2'])) {
	$old = $_POST['old'];
	$new = $_POST['new'];
	$cnew = $_POST['vnew'];
	$leng = strlen($_POST['new']);
	if (empty($old) || empty($new) || empty($cnew)) {
		$error = 'Field tidak boleh kosong!';
	} else if($leng < 3) {
		$error = 'Password minimal 3 karakter';
	} else if($new != $cnew) {
		$error = 'Konfirmasi password!';
	} else {
		$up = mysql_query("update tb_user set password1 = '$new' where username = '".$_SESSION['userid']."'");
		if ($up) {
			$error = "Ganti password berhasil";
		}
	}
	echo "<script> alert('".$error."');  window.location.href='index.php?goto=ubah'; </script>";
}
?>	
