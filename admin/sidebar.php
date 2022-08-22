<?php
include('../connect-db.php');
$r = mysql_query("SELECT max(id) AS total FROM link1");
list($total) = mysql_fetch_array($r);
$file1 = $_FILES['banner'];
$total += 1;
if (isset($_POST['kirim1'])) {
	$a=$_FILES['banner']['name'];
	$m=strlen($a);
	$p=strtolower(substr($_FILES['banner']['name'],$m-3,3));
	$newfile="img-".$total.".".$p;
	if ($p<>'jpg' && $p<>'png' && $p<>'gif' && $p<>'jpeg') {
		echo "Format gambar harus file .jpg, .png, .gif, .jpeg, <a href='index.php?goto=sidebar'>Kembali</a>";
		exit;
	} else { 
		move_uploaded_file($file1['tmp_name'],"../images/$newfile");
		mysql_query("INSERT INTO link1 (banner) VALUES ('$newfile')"); 
		echo "<script> alert('SUKSES!!. Gambar berhasil disimpan.'); window.location.href='index.php?goto=sidebar'; </script>";
	}
}
if(isset($_GET['link1']) AND ($_GET['link1'] == "del")){
	$id = $_GET['id'];
	$im = mysql_fetch_array(mysql_query("SELECT * from link1 where id='$id'"));
	if (!empty($im['banner'])) {
		unlink("../images/".$im['banner']);
	}
	$del = mysql_query("DELETE from link1 where id='$id'");
	echo "<script> alert('Delete berhasil!'); window.location.href='index.php?goto=sidebar'; </script>";
}
?>
<table width="100%" cellpadding="5">
	<tr>
		<td colspan="2"><h3 style="color:green;">Setting Sidebar Banner</h1><hr color="red"></td>
	</tr>
	<tr>
		<td>
			<form method="post" action="" enctype="multipart/form-data">
			<table width="100%" style="font-family:verdana; font-size:12; border:1px solid black;" cellpadding="5" bgcolor="#fff">
				<tr bgcolor="#c0c0c0">
					<td colspan="2"><font face="cambria" color="#000" size="2"><strong>&raquo; SIDEBAR</strong><i>(PARTNER)</td>
				</tr>
				<tr>
					<td style="border-bottom:1px solid #c0c0c0;">Display Image</td>
					<td align="center" style="border-bottom:1px solid #c0c0c0;">Action</td>
				</tr>
				<?php $ban = mysql_query("SELECT * from link1"); $i=1; while ($b = mysql_fetch_array($ban)) {?>
				<tr>
					<td align="left" style="border-bottom:1px solid #c0c0c0;"><img src="<?php echo $url2."images/".$b['banner'];?>"></td> 
					<td align="center" style="border-bottom:1px solid #c0c0c0;"><a href="?goto=sidebar&link1=del&id=<?php echo $b['id'];?>" target="_parent"><img src="images/del.png"></a></td>
				</tr>
				<?php $i++; } ?>
				<tr>
					<td colspan="2" align="center">Tambah banner baru? <i>(ukr:370x150)</i><hr><input type="file" name="banner"/><input type="submit" name="kirim1" value="UPLOAD"/></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>