<?php
header("Access-Control-Allow-Origin: *");
include "connect-db.php";
function antara($start_date, $end_date, $todays_date){
	$start_timestamp = strtotime($start_date);
	$end_timestamp = strtotime($end_date);
	$today_timestamp = strtotime($todays_date);
	return (($today_timestamp >= $start_timestamp) && ($today_timestamp <= $end_timestamp));
}
$hour = date("Y-m-d");
$dfor = "date_format(r1.date1, '%Y-%m-%d')";
$cek1 = mysql_result(mysql_query("SELECT max($dfor) FROM result"),0);
if($cek1 == $hour){
	if(antara(''.$mulai.'',''.$akhir.'',date("H:i:s"))){
		$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id where date_format(r1.date1,'Y%')>='2018' order by $dfor desc limit 1,1");
	} else {
		$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id where date_format(r1.date1,'Y%')>='2018' order by $dfor desc limit 1");
	}
} else {
	$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id where date_format(r1.date1,'Y%')>='2018' order by $dfor desc limit 1");
}
if (mysql_num_rows($per) > 0){
	while ($hasil = mysql_fetch_array($per)){
		$result[] = array(
						array(
							"id"		=> "318",
							"pasaran"	=> "VICTORIA POOLS",
							"tgl"		=> date('Y-m-d', strtotime($hasil['date1'])),
							"keluaran"	=> substr($hasil['prize1'],2,4)
						)
				);
	}
	echo json_encode($result,true);
}
?>