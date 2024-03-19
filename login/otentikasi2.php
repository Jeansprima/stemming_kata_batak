<?php
include('../config/koneksi.php');

session_start();
//tangkap data dari form login


@$username	= $_GET['user'];
@$password 	= $_GET['pass'];

//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// query cek
$q = mysql_query("SELECT * from login where username='$username' and password='$password'");

// tampil data
$data = mysql_fetch_array($q);
if(mysql_num_rows($q)==1){
	
	$_SESSION['username']    = $username;
	$_SESSION['iduser']	 = $data["iduser"];
	$_SESSION['password']	 = $data['password'];
	$_SESSION['akses']		 = $data['akses'];
	
// kode levelisasi
	if($data["akses"]=="1")
	{ 
	?>
		<script type="text/javascript">
		alert("Selamat Datang <?php echo $username;?>");
	    document.location='../admin/index.php';
        </script>       
	<?php
	} else if($data["akses"]=="2")
 
	{ 
	?>
		<script type="text/javascript">
		alert("Selamat Datang <?php echo $username;?>");
	    document.location='../siswa/index.php';
        </script>       
	<?php
	} else if($data["level"]=="3")
	{ 
	?>
		<script type="text/javascript">
		alert("Selamat anda berhasil login");
	    document.location='../index.php?mod=page/profil&pg=profil';
        </script>       
	<?php
	}
	
}
else
{
	?>
	<script type="text/javascript">
		alert("Username atau password salah");
		document.location='../index.php?module=Login';
	</script>
    <?php            
}
mysql_close();
?>