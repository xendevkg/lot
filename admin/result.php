<?php
include "connect-db.php";
$result1 = mysql_query("SELECT temp.*, result.* FROM temp INNER JOIN result ON temp.id=result.id order by temp.id DESC limit 1");
$jum = mysql_num_rows($result1);
if ($jum > 0) {
	$hasil1 = mysql_fetch_array($result1);
?>
<table width="100%" cellpadding="5" >
	<tr class="colom2">
		<td align="left"><b>Draw No. <?php echo $hasil1['id'];?><span style='float:right;'><?php echo "Date : ".$hasil1['day'].", ".$hasil1['date1']."";?></span></b></td>
	</tr>
	<tr class="colom3">
		<td align="center" width="50%">
			<table style="border:1px solid #fff; text-align:center;" cellpadding="1" cellspacing="5" width="100%">
				<tr style="background:#ffbc00;">
					<td colspan="3" style="background:#12689b; height:30px; text-align:center; color:#fff;">Prize 1</td>
					<td colspan="2"><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize1']);?></td>
				</tr>
				<tr style="background:#ffbc00;">
					<td colspan="3" style="background:#12689b; height:30px; text-align:center; color:#fff;">Prize 2</td>
					<td colspan="2"><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize2']);?></td>
				</tr>
				<tr style="background:#ffbc00;">
					<td colspan="3" style="background:#12689b; height:30px; text-align:center; color:#fff;">Prize 3</td>
					<td colspan="2"><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize3']);?></td>
				</tr>
				<tr>
					<td colspan="5" style="background:#12689b; height:30px; text-align:center; color:#fff;">Started</td>
				</tr>
				<tr style="background:#ffbc00;">
					<td><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize4']);?></td>
					<td><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize5']);?></td>
					<td><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize6']);?></td>
					<td><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize7']);?></td>
					<td><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize8']);?></td>
				</tr>
				<tr>
					<td colspan="5" style="background:#12689b; height:30px; text-align:center; color:#fff;">Consolation</td>
				</tr>
				<tr style="background:#ffbc00;">
					<td><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize9']);?></td>
					<td><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize10']);?></td>
					<td><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize11']);?></td>
					<td><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize12']);?></td>
					<td><?php echo preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil1['prize13']);?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php }?>