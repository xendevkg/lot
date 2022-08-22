<?php 
include "../connect-db.php";
	if (!isset($_SESSION['userid'])) {
	header('Location: index.php');
	exit;
	}
if (isset($_POST['edit'])) {
	$id = $_GET['id'];
	$user_id = $_POST['user_id'];
	$uname = $_POST['username'];
	$upass = $_POST['password1'];
	$level = $_POST['level'];
	$update = mysql_query("update tb_user set username='$uname', password1='$upass', level='$level' where user_id='$id'");
	mysql_query("DELETE from tb_akses where admin='$uname'");
		if (!empty($_POST['akses'])) {
			foreach ($_POST['akses'] as $ak => $akses ) {
			$save2 = mysql_query("insert into tb_akses(admin, akses) values('$uname', '$akses')");
			}
		}	
	if ($update) {
	echo "<script> alert('Okey... Data berhasil disimpan!');</script>";
	header('Location: index.php?goto=list');
	exit;
	}
}	

if (isset($_GET['act']) && $_GET['act'] == 'delete') {
	$id = $_GET['id'];
	$nama = mysql_fetch_array(mysql_query("SELECT username from tb_user where user_id='$id'"));
	$unama = $nama['username'];
	$delete = mysql_query("delete from tb_user where user_id = '$id'");
	$delete = mysql_query("delete from tb_akses where admin = '$unama'");
	header('Location: index.php?goto=list');
	exit;
}
 ?>
<script type="text/javascript">
checked=false;
function checkedAll (frm1) {
	var aa= document.getElementById('frm1');
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
}
</script> 
<table width="100%" cellpadding="5">
	<tr>
		<td colspan="2"><h3 style="color:green;">User Administrator</h1><hr color="red"></td>
	</tr>
	<tr>
		<td>
<form id="form1" name="form1" method="post" action="">
<?php
$xaks = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='view_admin'"));
if ($xaks>0){
?>
	<table width="100%" cellpadding="5">
		<tr bgcolor="#739721" height="40">
			<td align="center"><b style="color:#fff;">No</b></td>
			<td align="center"><b style="color:#fff;">USERNAME</b></td>
			<td align="center"><b style="color:#fff;">PASSWORD</b></td>
			<td align="center"><b style="color:#fff;">LEVEL</b></td>
			<td colspan="2" align="center"><b style="color:#fff;">AKSI</b></td>
		</tr>
		<?php 
		$sql = mysql_query("SELECT * from tb_user order by last_login desc"); 
		$jum = mysql_num_rows($sql);
		if ($jum > 0) {
		$i = 1;
		while ($hasil = mysql_fetch_array($sql)) {  
		?>
		<tr>
			<td align="center" bgcolor="#CCCCCC"><?php echo $i ?></td>
			<td align="center" bgcolor="#CCCCCC"><?php echo $hasil['username']; ?></a></td>
			<td align="center" bgcolor="#CCCCCC"><?php $ganti = $hasil['password1']; $pass = preg_replace('/[a-z0-9A-Z!@#$%^&*()_+\'\\{}?><.,]/', '<b>&bull;</b>', $ganti); print $pass; ?></a></td>
			<td align="center" bgcolor="#CCCCCC"><?php echo $hasil['level']; ?></a></td>
			<?php $xaks = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='edit_admin'")); if ($xaks>0){ ?>			
			<td align="center" bgcolor="#CCCCCC"><a href="index.php?goto=list&act=edit&id=<?php echo $hasil['user_id']; ?>" title="EDIT DATA"><img src="images/edit.png"></a></td><?php } ?>
			<?php $xaks = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='del_admin'")); if ($xaks>0){ ?>			
			<td align="center" bgcolor="#CCCCCC"><a href="index.php?goto=list&act=delete&id=<?php echo $hasil['user_id']; ?>" title="DELETE"><img src="images/del.png"></a></td><?php } ?>
		</tr>
<?php $i++; 
	} } else {
	echo "<tr align='center'><td colspan='3'>User tidak ditemukan!!!</td></tr>";
	} 
?>
	</table>
<?php }
	if (isset($_GET['act']) && $_GET['act'] == 'edit') {
	$bk = mysql_fetch_array(mysql_query("SELECT tb_akses.*, tb_user.* from tb_user join tb_akses on tb_user.username=tb_akses.admin where tb_user.user_id = '".$_GET['id']."'"));
	$yyy = $bk['admin'];
?>
<hr color="red" width="100%">
<table width="100%" cellpadding="5">
	<tr class="colom2">
		<td colspan="5" style="padding:10px;" align="center"><h2>EDIT DATA : <font color="orange"><?php echo strtoupper($bk['username']);?></h2></td>
	</tr>	
	<tr class="colom3">
		<td colspan="2" style="padding:10px;" align="center"><b>USERNAME</td>
		<td style="padding:10px;" align="center"><b>PASSWORD</td>
		<td colspan="2" style="padding:10px;" align="center"><b>LEVEL</td>
	</tr>
	<tr>
		<td><label for="edit"></label><input name="user_id" type="hidden" value="<?php echo $bk['user_id']; ?>" /></td>
		<td align="center"><input name="username" value="<?php echo $bk['username']; ?>" type="text" size="15" id="username" /></td>
		<td align="center"><input name="password1" value="<?php echo $bk['password1']; ?>" type="text" size="40" id="password1" /></td>
		<td align="center"><label for="level"></label>
			<select name="level" id="level">
				<option value="">--Pilih Level User--</option>
				<option value="user">User</option>
				<option value="super user">Super User</option>
			</select>
		</td>
	</tr>	
	<tr class="colom2">
		<td colspan="4" style="padding:10px;" align="left"><b>HAK AKSES</td>
	</tr>	
	<tr>
		<td colspan="4" style="padding:10px;">
			<label>&raquo; <input type="checkbox" name="akses[]" value="set_web" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'set_web'); if ($s2 > 0) { echo " checked"; } ?>/>Setting Website</label>
			<label><input type="checkbox" name="akses[]" value="set_waktu" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'set_waktu'); if ($s2 > 0) { echo " checked"; } ?>/>Setting Waktu</label>
			<label><input type="checkbox" name="akses[]" value="set_sidebar" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'set_sidebar'); if ($s2 > 0) { echo " checked"; } ?>/>Setting Sidebar</label><br><hr color="grey" size="1">
			<label>&raquo; <input type="checkbox" name="akses[]" value="tambah_result" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'tambah_result'); if ($s2 > 0) { echo " checked"; } ?>/>Tambah Result</label>
			<label><input type="checkbox" name="akses[]" value="edit_result" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'edit_result'); if ($s2 > 0) { echo " checked"; } ?>/>Ubah Result</label>
			<label><input type="checkbox" name="akses[]" value="view_result" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'view_result'); if ($s2 > 0) { echo " checked"; } ?>/>Lihat Result Hari Ini</label>
			<label><input type="checkbox" name="akses[]" value="data_result" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'data_result'); if ($s2 > 0) { echo " checked"; } ?>/>Lihat Result Keseluruhan</label>
			<label><input type="checkbox" name="akses[]" value="del_result" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'del_result'); if ($s2 > 0) { echo " checked"; } ?>/>Hapus Result</label><br><hr color="grey" size="1">
			<label>&raquo; <input type="checkbox" name="akses[]" value="tambah_admin" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'tambah_admin'); if ($s2 > 0) { echo " checked"; } ?>/>Tambah Admin</label>
			<label><input type="checkbox" name="akses[]" value="edit_admin" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'edit_admin'); if ($s2 > 0) { echo " checked"; } ?>/>Ubah Admin</label>
			<label><input type="checkbox" name="akses[]" value="view_admin" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'view_admin'); if ($s2 > 0) { echo " checked"; } ?>/>Lihat Admin</label>
			<label><input type="checkbox" name="akses[]" value="del_admin" id="CheckboxGroup1_0" <?php $s2 = 0; $s2 = cek($yyy, 'del_admin'); if ($s2 > 0) { echo " checked"; } ?>/>Hapus Admin</label>
		</td>
	</tr>	
	<tr class="colom3">
		<td colspan="4" align="right"><input type="submit" name="edit" id="edit" value="UPDATE"/></td>
	</tr>
</table>
	<?php } else { ?>
<hr color="red">
<?php $xaks = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='tambah_admin'")); 
	if ($xaks>0){ ?>
<table width="100%" cellpadding="5">
<label for="save"></label>
	<tr class="colom2">
		<td colspan="4" style="padding:5px;" align="center"><h2>TAMBAH ADMIN</h2></td>
	</tr>	
	<tr class="colom3">
		<td colspan="2" style="padding:10px;" align="center"><b>USERNAME</td>
		<td style="padding:10px;" align="center"><b>PASSWORD</td>
		<td colspan="2" style="padding:10px;" align="center"><b>LEVEL</td>
	</tr>
	<tr>
		<td><input name="user_id" type="hidden" value="<?php echo $bk['user_id']; ?>" /></td>
		<td align="center"><input name="username" value="<?php echo $bk['username']; ?>" type="text" size="15" id="username" /></td>
		<td align="center"><input name="password1" value="<?php echo $bk['password1']; ?>" type="text" size="40" id="password1" /></td>
		<td align="center"><label for="level"></label>
			<select name="level" id="level">
				<option value="">--Pilih Level User--</option>
				<option value="user">User</option>
				<option value="super user">Super User</option>
			</select>
		</td>
	</tr>	
	<tr class="colom2">
		<td colspan="4" style="padding:10px;" align="left"><b>HAK AKSES</td>
	</tr>	
	<tr>
		<td colspan="4" style="padding:10px;">
			<label>&raquo; <input type="checkbox" name="akses[]" value="set_web" id="CheckboxGroup1_0" />Setting Website</label>
			<label><input type="checkbox" name="akses[]" value="set_waktu" id="CheckboxGroup1_0" />Setting Waktu</label>
			<label><input type="checkbox" name="akses[]" value="set_sidebar" id="CheckboxGroup1_0" />Setting Sidebar</label><br><hr color="grey" size="1">
			<label>&raquo; <input type="checkbox" name="akses[]" value="tambah_result" id="CheckboxGroup1_0" />Add Result</label>
			<label><input type="checkbox" name="akses[]" value="edit_result" id="CheckboxGroup1_0" />Edit Result</label>
			<label><input type="checkbox" name="akses[]" value="view_result" id="CheckboxGroup1_0" />View Result</label>
			<label><input type="checkbox" name="akses[]" value="data_result" id="CheckboxGroup1_0" />View Result Keseluruhan</label>
			<label><input type="checkbox" name="akses[]" value="del_result" id="CheckboxGroup1_0" />Delete Result</label><br><hr color="grey" size="1">
			<label>&raquo; <input type="checkbox" name="akses[]" value="tambah_admin" id="CheckboxGroup1_0" />Add Admin</label>
			<label><input type="checkbox" name="akses[]" value="edit_admin" id="CheckboxGroup1_0" />Edit Admin</label>
			<label><input type="checkbox" name="akses[]" value="view_admin" id="CheckboxGroup1_0" />View Admin</label>
			<label><input type="checkbox" name="akses[]" value="del_admin" id="CheckboxGroup1_0" />Delete Admin</label>
		</td>
	</tr>	
	<tr class="colom3">
		<td colspan="6" align="right"><input type="submit" name="save" id="save" value="TAMBAH" class="button" /></td>
	</tr>	
</table>
<?php } } ?>
</tr>
</table>
</form>
<?php
if (isset($_POST['save'])) {
	$user = $_POST['username'];
	$pass = $_POST['password1'];
	$level = $_POST['level'];
	$msg = '';
	$nm = mysql_num_rows(mysql_query("SELECT * from tb_user where username='$user'"));
	if (strlen($pass) < 3) {
		$msg = "Password harus lebih dari 3 karakter.";
	} else if ($nm >0 ) {
		$msg = "Username sudah ada.";
	} else {
		$save = mysql_query("INSERT into tb_user(username, password1, level, register_date) values('$user', '$pass', '$level', NOW())");
		if (!empty($_POST['akses'])) {
			foreach ($_POST['akses'] as $ak => $akses ) {
			$save2 = mysql_query("insert into tb_akses(admin, akses) values('$user', '$akses')");
			}
		}
	if ($save) {
		
		$msg = "User berhasil ditambah.";
		}
	}
	if (!empty($msg)) {
		echo "<script> alert('".$msg."'); window.location.href='index.php?goto=list'; </script>";
	}
	}
?>