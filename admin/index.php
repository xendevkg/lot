<?php
session_start(); 
include '../connect-db.php';

	if (!isset($_SESSION['userid'])) {
	header('Location: user.php');
	exit;
	}
	
	if (isset($_GET['goto'])) { $view = $_GET['goto']; } else { $view = ''; }
	switch ($view) {
	
	case '' :
	$pageTitle = "Administrator Page";
	$content = 'beranda.php';
	break;

	case 'editresult' :
	$pageTitle = "Administrator Page";
	$content = 'home.php';
	break;
	
	case 'add' :
	$pageTitle = 'Tambah Result - Administrator Page';
	$content = 'add.php';
	break;	
    
	case 'editprize' :
	$pageTitle = "Edit 2-15 Prize - Administrator Page";
	$content = 'edit.php';
	break;

	case 'ubah' :
	$pageTitle = 'Reset Password - Administrator Page';
	$content = 'resetpass.php';
	break;	

	case 'list' :
	$pageTitle = 'List Admin - Administrator Page';
	$content = 'listadmin.php';
	break;	

	case 'sidebar' :
	$pageTitle = 'Sidebar - Administrator Page';
	$content = 'sidebar.php';
	break;	

	case 'result' :
	$pageTitle = 'Result - Administrator Page';
	$content = 'result.php';
	break;	

	case 'setting' :
	$pageTitle = 'Konfigurasi website - Administrator Page';
	$content = 'konfigurasi.php';
	break;	

	case 'waktu' :
	$pageTitle = 'Konfigurasi Waktu LIVERESULT - Administrator Page';
	$content = 'konflive.php';
	break;	

	default:
    $pageTitle = "Administrator Page";
	$content = 'beranda.php';
}
	
	include "template.php";

	function cek($admin, $akses) { 
	$cek = 0; 
	$sql = mysql_query("SELECT * from tb_akses where admin='$admin' AND akses='$akses'"); 
	$cek = mysql_num_rows($sql); 
	return $cek; 
	}	
?>