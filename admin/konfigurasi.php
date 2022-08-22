<?php
include('../connect-db.php');
	$saya = mysql_query("SELECT * FROM konfigurasi WHERE id=1");
	$ok = mysql_fetch_array($saya);
	$tampan = $ok['timezone'] ;
	$ganteng = $ok['judul'] ;
	$manis = $ok['logo'] ;
	$keren = $ok['about'] ;
	$bijaksana = $ok['disclaimer'] ;
	$baik = $ok['email'] ;
	$gmt = $ok['gmt'];
	$ban = $ok['banner'];

if (isset($_POST['submit2'])) {	   
	include('../connect-db.php');	
	$tampan = $_POST['timezone'];
	$ganteng = $_POST['judul'];
	$keren = $_POST['about'];
	$bijaksana = $_POST['disclaimer'];
	$baik = $_POST['email'];
	$gmt = $_POST['gmt'];
	$simp = mysql_query("UPDATE konfigurasi SET email='$baik', gmt='$gmt', timezone='$tampan', judul='$ganteng', about='$keren', disclaimer='$bijaksana' WHERE id='1'")
	or die(mysql_error());
	echo "<script>alert('Perubahan telah disimpan!'); window.location.href='index.php?goto=setting';</script>";
	exit;
}
// Logo ---
if (isset($_POST['save_logo'])){
	$manisx = $_FILES['logo'];
	$a=$_FILES['logo']['name'];
	$m=strlen($a);
	$p=strtolower(substr($a,$m-3,3));
	$newfile="logo.".$p;
	if ($p<>'jpg' && $p<>'png' && $p<>'gif' && $p<>'jpeg') {
		echo "<center>Format gambar harus file .jpg, .png, .gif, .jpeg<br><a href='index.php?goto=setting'>Kembali</a></center>";
		exit;
	} else { 
		unlink("../images/".$manis);
		move_uploaded_file($manisx['tmp_name'],"../images/$newfile");
		mysql_query("update konfigurasi set logo='$newfile' where id=1"); 
		echo "<script> alert('SUKSES!!. Gambar berhasil disimpan.'); window.location.href='index.php?goto=setting'; </script>";
	}
}
// Banner ---
if (isset($_POST['save_banner'])){
	$banx = $_FILES['banner'];
	$aa=$_FILES['banner']['name'];
	$mm=strlen($aa);
	$pp=strtolower(substr($aa,$mm-3,3));
	$newfilex="banner.".$pp;
	if ($pp<>'jpg' && $pp<>'png' && $pp<>'gif' && $pp<>'jpeg') {
		echo "<center>Format gambar harus file .jpg, .png, .gif, .jpeg<br><a href='index.php?goto=setting'>Kembali</a></center>";
		exit;
	} else { 
		unlink("../images/".$ban);
		move_uploaded_file($banx['tmp_name'],"../images/$newfilex");
		mysql_query("update konfigurasi set banner='$newfilex' where id=1"); 
		echo "<script> alert('SUKSES!!. Gambar berhasil disimpan.'); window.location.href='index.php?goto=setting'; </script>";
	}
}
?>	
<form action="" method="post" enctype="multipart/form-data">
	<table width="100%" cellpadding="5">
		<tr>
			<td colspan="3"><h3 style="color:green;">Setting Konfigurasi Website</h1><hr color="red"></td>
		</tr>	
		<tr>
			<td width="25%" class="colom3">Nama Website</td>
			<td width="1%" valign="top">:</td>
			<td width="74%" class="colom2"><input name="judul" type="text" size="100%" value="<?php echo $ganteng; ?>" /></input></td> 
		</tr>
		<tr>
			<td width="25%" class="colom3">Timezone</td>
			<td width="1%" valign="top">:</td>
			<td width="74%" class="colom2"><input name="timezone" type="text" size="100%" value="<?php echo $tampan; ?>" /></input></td> 
		</tr>
		<tr>
			<td width="25%" class="colom3">GMT</td>
			<td width="1%" valign="top">:</td>
			<td width="74%" class="colom2"><input name="gmt" type="text" size="100%" placeholder="contoh, GMT+7" value="<?php echo $gmt; ?>" /></input></td> 
		</tr>
		<tr>
			<td width="25%" class="colom3">Email</td>
			<td width="1%" valign="top">:</td>
			<td width="74%" class="colom2"><input name="email" type="text" size="100%" value="<?php echo $baik; ?>" /></input></td> 
		</tr>
		<tr>
			<td width="25%" valign="top" class="colom3">Logo</td>
			<td width="1%" valign="top">:</td>
			<td width="74%" class="colom2">
				<table>
					<tr>
						<td colspan=""><img src="<?php echo $url2."images/".$manis;?>" width="195" height="183"></td>
						<td>Ukuran File: 195x183<hr>
						<input type="file" name="logo"></input><input type="submit" name="save_logo" value="Upload"/></td> 
					</tr>
				</table>
			</td>
		</tr>		<tr>
			<td width="25%" class="colom3" valign="top">Homepage</td>
			<td width="1%" valign="top">:</td>
			<td width="74%" class="colom2"><textarea name="about"><?php echo $keren; ?></textarea></td> 
		</tr>
		<tr>
			<td width="25%" class="colom3" valign="top">Rules / Ketentuan</td>
			<td width="1%" valign="top">:</td>
			<td width="74%" class="colom2"><textarea name="disclaimer"><?php echo $bijaksana; ?></textarea></td> 
		</tr>
		<tr class="colom2">
			<td colspan="3" align="right"><input type="submit" name="submit2" value="UPDATE" /> </td>
		</tr>
	</table>
</form>