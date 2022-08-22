<?php 
include "../connect-db.php";
if (!isset($_SESSION['userid'])) {
	header('Location: index.php');
	exit;
}
if (isset($_POST['edit'])) {
	$x = mysql_real_escape_string(htmlspecialchars($_POST['idx']));
	$prize1 = mysql_real_escape_string(htmlspecialchars($_POST['prize1']));
	$prize2 = mysql_real_escape_string(htmlspecialchars($_POST['prize2']));
	$prize3 = mysql_real_escape_string(htmlspecialchars($_POST['prize3']));
	$prize4 = mysql_real_escape_string(htmlspecialchars($_POST['prize4']));
	$prize5 = mysql_real_escape_string(htmlspecialchars($_POST['prize5']));
	$prize6 = mysql_real_escape_string(htmlspecialchars($_POST['prize6']));
	$prize7 = mysql_real_escape_string(htmlspecialchars($_POST['prize7']));
	$prize8 = mysql_real_escape_string(htmlspecialchars($_POST['prize8']));
	$prize9 = mysql_real_escape_string(htmlspecialchars($_POST['prize9']));
	$prize10 = mysql_real_escape_string(htmlspecialchars($_POST['prize10']));
	$prize11 = mysql_real_escape_string(htmlspecialchars($_POST['prize11']));
	$prize12 = mysql_real_escape_string(htmlspecialchars($_POST['prize12']));
	$prize13 = mysql_real_escape_string(htmlspecialchars($_POST['prize13']));
	if(strlen($prize1)==6 && strlen($prize2)==6 && strlen($prize3)==6 && strlen($prize4)==6 && strlen($prize5)==6 && strlen($prize6)==6 && strlen($prize7)==6 && strlen($prize8)==6 && strlen($prize9)==6 && strlen($prize10)==6 && strlen($prize11)==6 && strlen($prize12)==6 && strlen($prize13)==6){
		$update = mysql_query("update result set prize1='$prize1' where id='$x'");	
		$update = mysql_query("update temp set prize2='$prize2', prize3='$prize3', prize4='$prize4', prize5='$prize5', prize6='$prize6', prize7='$prize7', prize8='$prize8', prize9='$prize9', prize10='$prize10', prize11='$prize11', prize12='$prize12', prize13='$prize13' where id=$x");
		if ($update) {
			echo "<script>alert('Berhasil'); window.location.href='index.php?goto=editprize&id=$x';</script>";
			exit;
		}
	} else {
		echo "<script>alert('Gagal, Periksa kembali angka yang anda masukkan!');</script>";
	}
}	
if (isset($_GET['id'])){
	$id = $_GET['id'];
 	$bk = mysql_fetch_array(mysql_query("SELECT result.*, temp.* from result inner join temp on result.id=temp.id where result.id='$id'"));
?>
<form action="" method="post">
<table width="100%" cellpadding="5">
	<tr>
		<td><h3 style="color:green;">Edit Result</h1><hr color="red"></td>
	</tr>
	<input type="hidden" name="idx" value="<?php echo $id;?>"/>
	<tr class="colom2">
		<td align="left"><b>Draw No. <?php echo $bk['id'];?><span style='float:right;'><?php echo "Date : ".$bk['day'].", ".$bk['date1']."";?></span></b></td>
	</tr>
	<tr class="colom3">
		<td align="center">
			<table style="border:1px solid #fff; text-align:center;" cellpadding="1" cellspacing="5" width="100%">
				<tr>
					<td colspan='3' style="background:#12689b; height:30px; text-align:center; color:#fff;">Prize 1</td>
					<td colspan='2'><input type="text" name="prize1" value="<?php echo $bk['prize1'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
				</tr>
				<tr>
					<td colspan='3' style="background:#12689b; height:30px; text-align:center; color:#fff;">Prize 2</td>
					<td colspan='2'><input type="text" name="prize2" value="<?php echo $bk['prize2'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
				</tr>
				<tr>
					<td colspan='3' style="background:#12689b; height:30px; text-align:center; color:#fff;">Prize 3</td>
					<td colspan='2'><input type="text" name="prize3" value="<?php echo $bk['prize3'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
				</tr>
				<tr>
					<td colspan="5" style="background:#12689b; height:30px; text-align:center; color:#fff;">Started</td>
				</tr>
				<tr>
					<td><input type="text" name="prize4" value="<?php echo $bk['prize4'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
					<td><input type="text" name="prize5" value="<?php echo $bk['prize5'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
					<td><input type="text" name="prize6" value="<?php echo $bk['prize6'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
					<td><input type="text" name="prize7" value="<?php echo $bk['prize7'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
					<td><input type="text" name="prize8" value="<?php echo $bk['prize8'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
				</tr>
				<tr>
					<td colspan="5" style="background:#12689b; height:30px; text-align:center; color:#fff;">Consolation</td>
				</tr>
				<tr>
					<td><input type="text" name="prize9" value="<?php echo $bk['prize9'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
					<td><input type="text" name="prize10" value="<?php echo $bk['prize10'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
					<td><input type="text" name="prize11" value="<?php echo $bk['prize11'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
					<td><input type="text" name="prize12" value="<?php echo $bk['prize12'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
					<td><input type="text" name="prize13" value="<?php echo $bk['prize13'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:92%;"/></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="colom2" align="center"><input type="submit" name="edit" value="UPDATE"></td> 
	</tr>
</table>
</form> 
<?php } ?>