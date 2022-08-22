<?php
ob_start();
session_start(); 
include '../connect-db.php';
function anti_injection($sql) {
   $sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$sql);
   $sql = trim($sql);
   $sql = strip_tags($sql);
   $sql = addslashes($sql);
   return $sql;
}
?>