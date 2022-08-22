<?php 
	include "../connect-db.php";
	$user = mysql_query("SELECT * from tb_user where username = '".$_SESSION['userid']."'");
		if (mysql_num_rows($user) > 0) {
			$u = mysql_fetch_array($user);			
		} else {
		header('Location: '.$url2.'user.php');
		exit;
		}

	if (isset($_GET['logout'])) {
		unset($_SESSION['userid']);
		header('Location: '.$url1.'user.php');
		exit;
	}
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" /><head>
<title><?php echo $pageTitle;?></title>
<link type="text/css" href="js/jdpicker.css"  rel="stylesheet" media="screen">
<link type="text/css" href="admin.css" rel="stylesheet">
<script type ="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type ="text/javascript" src="js/jquery.jdpicker.js"></script>
<script type ="text/javascript" src="js/jquery.min.js"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
  selector: 'textarea',
  height: 200,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | fontsizeselect | fontselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  font_formats: 'Arial=arial,helvetica,sans-serif;'+
                'Comic Sans MS=comic sans ms,sans-serif;'+
                'Tahoma=tahoma,arial,helvetica,sans-serif;'+
                'Verdana=verdana,geneva;'+
				'Russo One=Russo One,Russo One;'+
                'Ubuntu=Ubuntu,Ubuntu',
  fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
  forced_root_block : "",
  verify_html : false,
});
</script>
</head>
<body>
<div id="wrap">
<table width="100%" align="center">
	<tbody>
		<tr>
			<td>
			<div class="header">
				<table width="100%">
					<tr>
						<td align="left"><a href="index.php"><img src="<?php echo $url2."images/".$manis;?>" width="100"></a></td>	
						<td align="right">
							<table>
								<tr>
									<td rowspan="2"><img src="images/bl.png" width="40"></td>
									<td>Welcome </td>
									<td>:</td>
									<td><b><?php echo strtoupper($_SESSION['userid']);?></b></td>
								</tr>
								<tr>
									<td valign="top">Login Terakhir </td>
									<td valign="top">:</td>
									<td valign="top"><b><?php echo $u['last_login'];?></b></td>
								</tr>
								<tr>
									<td class="tdnya" colspan="4"><a href="index.php?goto=ubah"><b>CHANGE PASSWORD</b></a></td>
								</tr>	
							</table>
						</td>
					</tr>
				</table>
			</div>
			</td>	
		</tr>		
		<tr>
			<td>
			<div class="content-wrapper">
				<div id="nav">
					<ul>
						<li><?php $xaks = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='set_web'")); if ($xaks>0){ ?><a href="index.php?goto=setting"><b style="color:green">SET.WEBSITE</b></a><?php } ?></li>
						<li><?php $xaks = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='set_waktu'")); if ($xaks>0){ ?><a href="index.php?goto=waktu"><b style="color:green">SET.WAKTU</b></a><?php } ?></li>
						<li><?php $xaks = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='tambah_result'")); if ($xaks>0){ ?><a href="index.php?goto=add"><b style="color:blue">TAMBAH RESULT</b></a><?php } ?></li>
						<li><?php $xaks = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='data_result'")); if ($xaks>0){ ?><a href="index.php?goto=editresult"><b style="color:blue">DATA RESULT</b></a><?php } ?></li>
						<li><?php $xaks = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='view_result'")); if ($xaks>0){ ?><a href="index.php?goto=result"><b style="color:blue">RESULT</b></a><?php } ?></li>
						<li><?php $xaks = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='view_admin'")); if ($xaks>0){ ?><a href="index.php?goto=list"><b style="color:red">ADMIN</b></a><?php } ?></li>
						<li><a href="<?php echo $url2;?>" target="_blank" style="color:red; text-docoration:none; font-weight:bold;">VIEW.WEBSITE</a></li>
						<li><a href="index.php?logout" style="color:red; text-docoration:none; font-weight:bold;">KELUAR</a></li>
					</ul>
				</div>	
			</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="content">
				<?php include $content; ?>
				</div>
			</td>
		</tr>
	</tbody>
</table>
<div class="footer">&copy; <?php echo date("Y");?></div>
</div>
</body>
</html>
<?php ob_flush(); ?>