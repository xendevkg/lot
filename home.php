<?php
$hour = date("Y-m-d"); 
$res1 = mysql_query("SELECT * FROM result order by id DESC limit 1");
while($res11 = mysql_fetch_array($res1)) {
	if ($res11['date1'] == $hour){
		if(antara(''.$buka.'',''.$mulai.'',date("H:i:s"))){
		//data loading...
			include('2ndscript_010190.php');
		} else if(antara(''.$mulai.'',''.$akhir.'',date("H:i:s"))){
		//data livedraw...
			include('2ndscript_010190.php');
		} else if(antara(''.$akhir.'',''.$tutup.'',date("H:i:s"))){
		//data complete...
			include('homepage010190.php');
		}
	} else { 
		include('homepage010190.php'); 
	}
}
?>