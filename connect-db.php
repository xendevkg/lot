<?php 
error_reporting(0);
//----- KONEKSI -----//
$server = 'localhost';
$user = 'u802412798_victoriapool';
$pass = 'X3p[3HeO';
$db = 'u802412798_victoriapool';
//----- VALIDASI ----//
$connection = mysql_connect($server, $user, $pass) 
or die ("Could not connect to server ... \n" . mysql_error ());
mysql_select_db($db) 
or die ("Could not connect to database ... \n" . mysql_error ());
//----- SET HALAMAN ---//
$url2 = 'https://'.$_SERVER["SERVER_NAME"].'/';
$url = $url2.'admin/';
//----- SET WAKTU -----//
$waktu = mysql_query("SELECT * FROM konfigurasi WHERE id=1");
$test2 = mysql_fetch_array($waktu);
$judul = $test2['judul'];
$akhiran = $test2['timezone'];
$manis = $test2['logo'] ;
$gmt = $test2['gmt'] ;
$bg = $test2['banner'] ;
$dis = $test2['disclaimer'];
$email1 = $test2['email'];
$email2 = $test2['email2'];
$email3 = $test2['email3'];
$timezone = "".$akhiran."";
if(function_exists('date_default_timezone_set')) 
date_default_timezone_set($timezone);
//----- SET LIVE -----//
$gogo = mysql_query("SELECT * FROM waktu WHERE id=1");
$query = mysql_fetch_array($gogo);
$buka = $query['buka'];
$tutup = $query['tutup']; 
$mulai = $query['mulai']; 
$akhir = $query['akhir'];
$p1a = $query['p1a']; $p1b = $query['p1b']; 
$p2a = $query['p2a']; $p2b = $query['p2b']; $p2c = $query['p2c'];
$p3a = $query['p3a']; $p3b = $query['p3b']; $p3c = $query['p3c']; $p3d = $query['p3d'];
$s1 = $query['s1']; $s2 = $query['s2']; $s3 = $query['s3'];
$c1 = $query['c1']; $c2 = $query['c2']; $c3 = $query['c3'];	
$aaa = '00:00:01';
$bbb = '23:59:59';
?>