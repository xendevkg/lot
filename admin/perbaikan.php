<?php
error_reporting(1);
include('../connect-db.php'); 
$cari = mysql_fetch_array(mysql_query("select * from result where date1='01-10-2016'"));
$idx =  $cari['id'];
$iden = mysql_query("delete from result where id < 275");
$iden = mysql_query("delete from result where id < 275");
$car = mysql_query("select * from result where id > 0");
$jum = mysql_num_rows($car);
if ($jum > 0) {
	$i = 1;
	while($ca = mysql_fetch_array($car)){
		echo $i." - ".$ca['id']."<br>";
		$up = mysql_query("update result set id='$i' where id='".$ca['id']."'");
		$i++;
		if($up){
			$auto = mysql_result(mysql_query("select max(id) from result"),0)+1;
			mysql_query("ALTER TABLE result AUTO_INCREMENT = $auto");
			echo $auto;
		}
	}
}
$carr = mysql_query("select * from temp where id>0");
$jumm = mysql_num_rows($carr);
if ($jumm > 0) {
	$ii = 1;
	while($caa = mysql_fetch_array($carr)){
		echo $ii." - ".$caa['id']."<br>";
		$upp = mysql_query("update temp set id='$ii' where id='".$caa['id']."'");
		$ii++;
		if($upp){
			$autoo = mysql_result(mysql_query("select max(id) from temp"),0)+1;
			mysql_query("ALTER TABLE temp AUTO_INCREMENT = $autoo");
			echo $autoo;
		}
	}
}
?>