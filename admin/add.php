<?php 
include('../connect-db.php');
$x = mysql_result(mysql_query("select max(id) from result"),0)+1;
if (isset($_POST['submit'])){ 
	$date1 = date('Y-m-d',strtotime($_POST['date1']));
	$day = date('D', strtotime($date1));
	$harix = array(
		'Sun' => 'Sunday',
		'Mon' => 'Monday',
		'Tue' => 'Tuesday',
		'Wed' => 'Wednesday',
		'Thu' => 'Thursday',
		'Fri' => 'Friday',
		'Sat' => 'Saturday'
	);
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
	if(strlen($prize1)==6 && strlen($prize2)==6 && strlen($prize3)==6 && strlen($prize4)==6 && strlen($prize5)==6 && strlen($prize6)==6 && strlen($prize7)==6 && strlen($prize8)==6 && strlen($prize9)==6 && strlen($prize10)==6 && strlen($prize11)==6 && strlen($prize12)==6 && strlen($prize12)==6 && strlen($prize13)==6){
		mysql_query("INSERT INTO result(id ,day ,date1 ,prize1) VALUES ('$x', '$harix[$day]', '$date1', '$prize1')");
		mysql_query("INSERT INTO temp (id,prize2,prize3,prize4,prize5,prize6,prize7,prize8,prize9,prize10,prize11,prize12,prize13) value ('$x','$prize2','$prize3','$prize4','$prize5','$prize6','$prize7','$prize8','$prize9','$prize10','$prize11','$prize12','$prize13')");
		echo "<script>alert('Sukses, Data telah disimpan!'); window.location.href='index.php?goto=editresult';</script>";
	} else {
		echo "<script>alert('Gagal, Periksa kembali angka yang anda masukkan!');window.location.href='index.php?goto=add';</script>";
	}
}
?>
<script language="javascript" type="text/javascript">
function random() {
	var campur = "0123456789";
    var panjang = 6;
	<?php for($k1=1;$k1<14;$k1++){ echo "var random$k1 = '';".PHP_EOL;}?>
    for (var i=0; i<panjang; i++) {
		<?php for($k2=1;$k2<14;$k2++){
			echo "var hasil$k2 = Math.floor(Math.random() * campur.length);".PHP_EOL;
			echo "random$k2 += campur.substring(hasil$k2,hasil$k2+1);".PHP_EOL;
		}?>
	}
	<?php for($k3=1;$k3<14;$k3++){ echo "document.random_form.prize$k3.value = random$k3;".PHP_EOL;}?>
}
</script>
<form action="" method="post" name="random_form">
<table width="100%" cellpadding="5">
	<tr>
		<td><h3 style="color:green;">Tambah Result</h1>Harus diisi semua!, dan harus 6 digit<hr color="red"></td>
	</tr>
	<tr class="colom2">
		<td align="left"><b>Draw no. <?php echo $x;?>
			<div style='float:right; display:inline; width:50%;'>
				Tanggal: </b><input type="text" class="jdpicker" name="date1" value="<?php if(isset($_POST['date1'])) { echo $_POST['date1']; } ?>" size="11" />
			</div>
			<div style='float:right; display:inline; width:50%;'>
				<input type="button" value="Generate 6D" onClick="random();"></input>
			</div>
		</td>
	</tr>
	<tr class="colom3">
		<td align="center">
			<table style="border:1px solid #fff; text-align:center;" cellpadding="1" cellspacing="5" width="100%">
				<tr>
					<td colspan='3' style="background:#12689b; height:30px; text-align:center; color:#fff;">Prize 1</td>
					<td colspan='2'><input type="text" name="prize1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:95%;"/></td>
				</tr>
				<tr>
					<td colspan='3' style="background:#12689b; height:30px; text-align:center; color:#fff;">Prize 2</td>
					<td colspan='2'><input type="text" name="prize2" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:95%;"/></td>
				</tr>
				<tr>
					<td colspan='3' style="background:#12689b; height:30px; text-align:center; color:#fff;">Prize 3</td>
					<td colspan='2'><input type="text" name="prize3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:95%;"/></td>
				</tr>
				<tr>
					<td colspan="5" style="background:#12689b; height:30px; text-align:center; color:#fff;">Started</td>
				</tr>
				<tr>
					<td><input type="text" name="prize4" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:90%;"/></td>
					<td><input type="text" name="prize5" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:90%;"/></td>
					<td><input type="text" name="prize6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:90%;"/></td>
					<td><input type="text" name="prize7" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:90%;"/></td>
					<td><input type="text" name="prize8" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:90%;"/></td>
				</tr>
				<tr>
					<td colspan="5" style="background:#12689b; height:30px; text-align:center; color:#fff;">Consolation</td>
				</tr>
				<tr>
					<td><input type="text" name="prize9" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:90%;"/></td>
					<td><input type="text" name="prize10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:90%;"/></td>
					<td><input type="text" name="prize11" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:90%;"/></td>
					<td><input type="text" name="prize12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:90%;"/></td>
					<td><input type="text" name="prize13" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6" size="18" style="text-align:center; width:90%;"/></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="colom2" align="center"><input type="submit" name="submit" value="Tambah"></td> 
	</tr>
</table>
</form> 