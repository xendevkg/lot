<?php
include('../connect-db.php');
if (isset($_POST['submit1'])) {	   
	$buka = $_POST['buka'];
	$tutup = $_POST['tutup'];
	$mulai = $_POST['mulai'];
	$akhir = $_POST['akhir'];
	mysql_query("UPDATE waktu SET buka='$buka', tutup='$tutup', mulai='$mulai', akhir='$akhir' WHERE id=1")
	or die(mysql_error());
	header("Location: index.php?goto=waktu");				
}	
if (isset($_POST['submit2'])) {	   
	$p1a = $_POST['p1a']; $p1b = $_POST['p1b'];
	$p2a = $_POST['p2a']; $p2b = $_POST['p2b']; $p2c = $_POST['p2c'];
	$p3a = $_POST['p3a']; $p3b = $_POST['p3b']; $p3c = $_POST['p3c'];
	$s1 = $_POST['s1']; $s2 = $_POST['s2']; $s3 = $_POST['s3'];
	$c1 = $_POST['c1']; $c2 = $_POST['c2']; $c3 = $_POST['c3'];
	mysql_query("UPDATE waktu SET p1a='$p1a', p1b='$p1b', p2a='$p2a', p2b='$p2b', p2c='$p2c', p3a='$p3a', p3b='$p3b', p3c='$p3c', p3d='$p3c', s1='$s1', s2='$s2', s3='$s3', c1='$c1', c2='$c2', c3='$c3' WHERE id=1")
	or die(mysql_error());
	header("Location: index.php?goto=waktu");				
}
?>	
<form method="post">
<table width="100%" cellpadding="5">
	<tr>
		<td colspan="2"><h3 style="color:green;">Perhitungan Waktu NORMAL</h1><hr color="red"></td>
	</tr>
	<tr>
		<td>
			<table width="100%" border="0">
				<tr class="colom3" style="font-weight:bold;">
					<td width="15%" align="center" style="padding:7px;">DEFINISI</td>
					<td width="5%" align="center">DARI</td>
					<td width="5%" align="center">SAMPAI</td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">WAKTU STANDBY</td>
					<td align="center"><input type="text" name="buka" maxlength="9" size="6" value="<?php echo $buka; ?>"></td>
					<td align="center"><input type="text" name="mulai" maxlength="9" size="6" value="<?php echo $mulai; ?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Open LIVE RESULT</td>
					<td align="center"><?php echo $mulai;?></td>
					<td align="center"><input type="text" name="akhir" maxlength="9" size="6" value="<?php echo $akhir;?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Close LIVE RESULT</td>
					<td align="center"><?php echo $akhir; ?></td>
					<td align="center"><input type="text" name="tutup" maxlength="9" size="6" value="<?php echo $tutup; ?>"></td>
				</tr>
				<tr class="colom3" style="font-weight:bold;">
					<td colspan="3" align="right"><input type="submit" name="submit1" value="SIMPAN PERUBAHAN"></td>
				</tr>	
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2"><h3 style="color:green;">Perhitungan Waktu LIVE RESULT</h1><hr color="red"></td>
	</tr>
	<tr>
		<td>
			<table width="100%" border="0">
				<tr class="colom3" style="font-weight:bold;">
					<td width="15%" align="center" style="padding:7px;">DEFINISI</td>
					<td width="5%" align="center">DARI</td>
					<td width="5%" align="center">SAMPAI</td>
				</tr>
				<tr class="colom2">
					<td style="padding-left:10px;" colspan="3">Open Prize 1</td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Diam</td>
					<td align="center"><?php echo $mulai;?></td>
					<td align="center"><input type="text" name="p1a" maxlength="9" size="6" value="<?php echo $p1a;?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Loading</td>
					<td align="center"><?php echo $p1a; ?></td>
					<td align="center"><input type="text" name="p1b" maxlength="9" size="6" value="<?php echo $p1b;?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Acak + Result (close prize 1)</td>
					<td align="center"><?php echo $p1b; ?></td>
					<td align="center"><input type="text" disabled readonly maxlength="9" size="6" value="<?php echo $akhir;?>"></td>
				</tr>
				<tr class="colom2">
					<td style="padding-left:10px;" colspan="3">Open Prize 2</td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Diam</td>
					<td align="center"><?php echo $mulai;?></td>
					<td align="center"><input type="text" name="p2a" maxlength="9" size="6" value="<?php echo $p2a; ?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Loading</td>
					<td align="center"><?php echo $p2a;?></td>
					<td align="center"><input type="text" name="p2b" maxlength="9" size="6" value="<?php echo $p2b; ?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Acak + Result (close prize 2)</td>
					<td align="center"><?php echo $p2b; ?></td>
					<td align="center"><input type="text" name="p2c" maxlength="9" size="6" value="<?php echo $p2c;?>"></td>
				</tr>
				<tr class="colom2">
					<td style="padding-left:10px;" colspan="3">Open Prize 3</td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Diam</td>
					<td align="center"><?php echo $mulai;?></td>
					<td align="center"><input type="text" name="p3a" maxlength="9" size="6" value="<?php echo $p3a; ?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Loading</td>
					<td align="center"><?php echo $p3a;?></td>
					<td align="center"><input type="text" name="p3b" maxlength="9" size="6" value="<?php echo $p3b; ?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Acak + Result (close prize 3)</td>
					<td align="center"><?php echo $p3b; ?></td>
					<td align="center"><input type="text" name="p3c" maxlength="9" size="6" value="<?php echo $p3c;?>"></td>
				</tr>
				<tr class="colom2">
					<td style="padding-left:10px;" colspan="3">Open Started Prize</td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Diam</td>
					<td align="center"><?php echo $mulai;?></td>
					<td align="center"><input type="text" name="s1" maxlength="9" size="6" value="<?php echo $s1; ?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Loading</td>
					<td align="center"><?php echo $s1;?></td>
					<td align="center"><input type="text" name="s2" maxlength="9" size="6" value="<?php echo $s2; ?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Acak + Result (close Started Prize)</td>
					<td align="center"><?php echo $s2; ?></td>
					<td align="center"><input type="text" name="s3" maxlength="9" size="6" value="<?php echo $s3;?>"></td>
				</tr>
				<tr class="colom2">
					<td style="padding-left:10px;" colspan="3">Open Consolation Prize</td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Diam</td>
					<td align="center"><?php echo $mulai;?></td>
					<td align="center"><input type="text" name="c1" maxlength="9" size="6" value="<?php echo $c1; ?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Loading</td>
					<td align="center"><?php echo $c1;?></td>
					<td align="center"><input type="text" name="c2" maxlength="9" size="6" value="<?php echo $c2; ?>"></td>
				</tr>
				<tr class="colom">
					<td style="padding-left:10px;">Acak + Result (close Consolation Prize)</td>
					<td align="center"><?php echo $c2; ?></td>
					<td align="center"><input type="text" name="c3" maxlength="9" size="6" value="<?php echo $c3;?>"></td>
				</tr>
				<tr class="colom3" style="font-weight:bold;">
					<td colspan="3" align="right"><input type="submit" name="submit2" value="SIMPAN PERUBAHAN"></td>
				</tr>	
			</table>
		</td>
	</tr>	
	<tr>
		<td colspan="2"><hr color="red"></td>
	</tr>
	<tr>
		<td colspan="2" class="colom" style="padding-left:10px;"><i>*) Setting waktu harus sesuai dengan timezone pada server (RECOMENDED)</i></td>
	</tr>
</table>
</form>