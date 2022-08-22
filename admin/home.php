<?php
include('../connect-db.php');
if(isset($_POST['editresult'])) {
	$id = $_POST['id'];
	$day = $_POST['day'];
	$date1 = $_POST['date1'];
	$prize1 = $_POST['prize1'];
	$updateresult = mysql_query("update result set day='$day', date1='$date1', prize1='$prize1' where id='$id'");
	}
if ($hapus) {
	header('Location: index.php?goto=editresult');
	exit;
	}
$edit = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='edit_result'"));
$del = mysql_num_rows(mysql_query("select * from tb_akses where admin='".$_SESSION['userid']."' and akses='del_result'"));
?>
<table cellpadding="5" width ="100%">
	<tr class="colom2">
		<td colspan="7" align="center"><b>DATA RESULT PER MINGGU</b></td>
	</tr>	
	<tr class="colom3">
		<td rowspan="2" width="1%" align="center"><b>No.</b></td>
		<td rowspan="2" width="1%" align="center"><b>Draw</b></td>
		<td rowspan="2" width="4%" align="center"><b>HARI</b></td>
		<td rowspan="2" width="4%" align="center"><b>TANGGAL</b></td>
		<td rowspan="2" width="10%" align="center"><b>1st PRIZE</b></td>
		<td colspan="2" width="6%" align="center"><b>AKSI</b></td>
	 </tr>
	 <tr class="colom3">
		<td width="1%" align="center"><b>EDIT</b></td>
		<td width="1%" align="center"><b>DELETE</b></td>
	 </tr>
<?php 
include "Pagination.php";
$page = 1;
$size = 7;
if (isset($_GET['page'])){
    $page = (int) $_GET['page'];
}
$sql3 = mysql_query("SELECT * from result");
$total_records = mysql_num_rows($sql3);
$pagination = new Pagination();
$pagination->setLink("index.php?goto=editresult&page=%s");
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setTotalRecords($total_records);
$sql = mysql_query("SELECT * from result order by id desc ". $pagination->getLimitSql()); 
$jum = mysql_num_rows($sql);
if ($jum > 0) {
	$i = 1;
	while ($hasil = mysql_fetch_array($sql)) {  
?>
	<tr class="colom" style="color:#000; font-weight:bold;">
		<td width="1%" align="center"><?php echo $i; ?></td>
		<td width="1%" align="center"><?php echo $hasil['id'];?></td>
		<td width="4%" align="left" style="padding-left:15px;"><?php echo $hasil['day'];?></td>
		<td width="4%" align="center"><?php echo $hasil['date1'];?></td>
		<td width="10%" align="center"><?php echo "". preg_replace('/(\d)/','<img src="images/$1.gif" width="20">',$hasil['prize1'])."";?></td>
		<td width="1%" align="center"><?php if ($edit>0){?><a href="index.php?goto=editprize&id=<?php echo $hasil['id'];?>"><img src="images/edit.png"></a><?php } ?></td>
		<td width="1%" align="center"><?php if ($del>0){?><a href="del.php?id=<?php echo $hasil['id'];?>"><img src="images/del.png"></a><?php } ?></td>
	 </tr>
<?php $i++; } } 
	else { 	echo "
	<tr class=colom' style='color:#000; font-weight:bold;'>
		<td colspan='7' align='center'>TIDAK ADA DATA</td>
	</tr>"; 
	}
?>
	<tr class="colom1">
		<td colspan="7" align="center"><?php $navigation = $pagination->create_links(); echo $navigation;?></td>
	</tr>
</table>	
