<?php 
  
  include "../../inc/config.php";

  error_reporting(0);
 
  $kdkata  		= $_POST['kdkata'];
  $kdimbuhan		= $_POST['kdimbuhan'];
  $katadasar   = $_POST['katadasar'];
  $awalan      = $_POST['awalan'];
  $sisipan     = $_POST['sisipan'];
  $akhiran     = $_POST['akhiran'];
  $partikel    = $_POST['partikel'];
  $kataganti   = $_POST['kataganti'];
  $pengertian  = $_POST['pengertian'];
 
 
     $query = mysql_query("UPDATE katadasar SET kata='$katadasar', pengertian='$pengertian'
           WHERE kdkata='$kdkata'");

      
	  
      if ($query) {
        mysql_query("UPDATE sisipan SET sisipan = '$sisipan' where kdimbuhan='$kdimbuhan'");
        mysql_query("UPDATE awalan SET awalan = '$awalan' where kdimbuhan='$kdimbuhan'");
        mysql_query("UPDATE akhiran SET akhiran = '$akhiran' where kdimbuhan='$kdimbuhan'");
        mysql_query("UPDATE partikel SET partikel = '$partikel' where kdimbuhan='$kdimbuhan'");
        mysql_query("UPDATE kataganti SET kataganti = '$kataganti' where kdimbuhan='$kdimbuhan'");
       ?>
<script type="text/javascript">
alert("Berhasil menyimpan data");
document.location = "../index.php?mod=suku&pg=data_katadasar";
</script>
<?php
      }
      else{
        ?>
<script type="text/javascript">
alert("Data gagal disimpan");
document.location = "../index.php?mod=suku&pg=data_katadasar";
</script>
<?php 
      } 

 
  mysql_close();
 ?>