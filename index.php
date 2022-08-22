<?php  
error_reporting(0);
function antara($start_date, $end_date, $todays_date){
	$start_timestamp = strtotime($start_date);
	$end_timestamp = strtotime($end_date);
	$today_timestamp = strtotime($todays_date);
	return (($today_timestamp >= $start_timestamp) && ($today_timestamp <= $end_timestamp));
}
session_start();
$_COOKIE['language'] = 'en-US';
setcookie('language', $_COOKIE['language']);
include('connect-db.php');
$saya = mysql_query("SELECT * FROM konfigurasi WHERE id=1");
$ok = mysql_fetch_array($saya);
$tampan = $ok['timezone'];
$ganteng = $ok['judul'];
$manis = $ok['logo'];
$keren = $ok['about'];
$bg = $ok['banner'];
$gaul = $ok['running_text'];
$bijaksana = $ok['disclaimer'];
$mail = $ok['email'];
if (isset($_GET['day'])) { $view = $_GET['day']; } else { $view = ''; }
	switch ($view) {
	
	case 'home' :
	$pageTitle = $ganteng;
	$content = 'home.php';
	break;

	case 'partner' :
	$pageTitle = $ganteng;
	$content = 'partner.php';
	break;

	case 'contact' :
	$pageTitle = $ganteng;
	$content = 'contact.php';
	break;

	case 'about' :
	$pageTitle = $ganteng;
	$content = 'about.php';
	break;

	case 'live' :
	$pageTitle = $ganteng;
	$content = 'live.php';
	break;

	case 'byday' :
	$pageTitle = $ganteng;
	$content = 'byday.php';
	break;

	default:
    $pageTitle = $ganteng;
	$content = 'home.php';
}	
include "template.php";
?>