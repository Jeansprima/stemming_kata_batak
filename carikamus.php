<?php
 include "inc/config.php";

  error_reporting(0);
  		$kata	= $_POST['kata'];
	
		//untuk mencegah sql injection
		//kita gunakan mysql_real_escape_string

		//awalan
		$q = mysql_query("SELECT * from awalan where awalan='$kata' ");
		// tampil data
		$data = mysql_fetch_array($q);
		$kdimbuhan = $data['kdimbuhan'];
		$sqlkata = mysql_query("SELECT * FROM katadasar inner join imbuhan on katadasar.kdkata = imbuhan.kdkata where kdimbuhan ='$kdimbuhan'");
		$dtkata = mysql_fetch_array($sqlkata);  
		if(mysql_num_rows($q)>0){
			?>
<script type="text/javascript">
document.location =
    'index.php?mod=kamus&kata=<?php echo $kata ?>&katadasar=<?php echo $dtkata['kata'] ?>';
</script>

<?php }
		else
		{
		?>
<script type="text/javascript">
alert("Kata yang anda cari belum terdaftar");
document.location = 'index.php?mod=kamus';
</script>
<?php            
		}