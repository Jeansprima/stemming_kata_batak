<?php
session_start();
error_reporting(0);  
if(!isset($_SESSION["akses"])){
		echo "<script>document.location.href='../index.php';</script>";
}else{

$akses   = $_SESSION['akses'];
$idyuratrip = $_SESSION['idyuratrip'];
 include "../inc/config.php";
 include "../inc/sidebar-admin.php";
 include "../inc/header-admin.php";
 


$pg = '';
if(!isset($_GET['pg'])) {
	
    include ('beranda/index.php');
  } else {
        $mod=$_GET['mod'];
        $pg = $_GET['pg'];
        include  $mod."/". $pg . ".php"; 
   }
	include "../inc/footer-admin.php";
}

?>


       