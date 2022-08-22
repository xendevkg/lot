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
$pppp = mysql_real_escape_string($_GET['p']);
$dddd = mysql_real_escape_string($_GET['d']);
$zzzz = mysql_real_escape_string($_GET['z']);
if(isset($pppp) && !empty($pppp)){
	if($pppp == 110){
		if($cek1 == $hour){
			if(antara(''.$mulai.'',''.$akhir.'',date("H:i:s"))){
				if(isset($_GET['d']) && !empty($_GET['d'])){
					$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id order by $dfor desc limit 1,$dddd");
				} else if(isset($_GET['z']) && !empty($_GET['z'])){
					$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id order by $dfor desc limit 1,$zzzz");
				} else {
					$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id where date_format(r1.date1,'Y%')>='2018' order by if($dfor='$hour', 1, r1.date1) asc limit 1,9999");
				}
			} else {
				if(isset($_GET['d']) && !empty($_GET['d'])){
					$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id order by $dfor desc limit $dddd");
				} else if(isset($_GET['z']) && !empty($_GET['z'])){
					$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id order by $dfor desc limit $zzzz");
				} else {
					$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id where date_format(r1.date1,'Y%')>='2018' order by $dfor asc");
				}
			}
		} else {
			if(isset($_GET['d']) && !empty($_GET['d'])){
				$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id order by $dfor desc limit $dddd");
			} else if(isset($_GET['z']) && !empty($_GET['z'])){
				$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id order by $dfor desc limit $zzzz");
			} else {
				$per = mysql_query("SELECT r1.*, r2.* FROM result as r1 join temp as r2 on r1.id=r2.id where date_format(r1.date1,'Y%')>='2018' order by $dfor asc");
			}
		}
		if (mysql_num_rows($per) > 0){
			$result = array();
			while ($hasil = mysql_fetch_array($per)){
				$result[] = array("keluaran" => substr($hasil['prize1'],2,4));
			}
			echo json_encode($result,true);
		}
	}
} else {
	echo "null";
}
?>