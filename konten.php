<?php error_reporting(E_ERROR | E_WARNING | E_PARSE); ?>
<?php include "inc/config.php" ?>
<?php 
	switch($_GET['mod']){
		case '': 
			include("home.php"); 
		break;
		case 'Home': 
			include("home.php"); 
		break;
		case 'sejarah': 
			include("sejarah.php"); 
		break;
		case 'Profil': 
			include("profil.php"); 
		break;
	case 'daftar': 
			include("daftar/daftar.php"); 
		break;
		case 'login': 
			include("login/login.php"); 
		break;
		case 'detaillapangan': 
			include("detaillapangan.php"); 
		break;
		case 'boking': 
			include("boking/boking.php"); 
		break;
		case 'Pembayaran': 
			include("pembayaran/pembayaran.php"); 
		break;
		case 'read': 
			include("baca.php"); 
		break;
		case 'kamus': 
			include("kamus.php"); 
		break;
		case 'FC2': 
			include("fc2.php"); 
		break;
		case 'processreg': 
			include("prosesdaftar.php"); 
		break;
		case 'start': 
			include("mulai.php"); 
		break;
		case 'Buku': 
			include("tanya.php"); 
		break;
		case 'processcon': 
			include("proseskonsul.php"); 
		break;
		case 'result': 
			include("analisahasil.php"); 
		break;
		case 'Login': 
			include("login/login.php"); 
		break;
		case 'Login': 
			include("login/login.php"); 
		break;
		case 'Pendaftaran': 
			include("daftar.php"); 
		break;
	};
?>	