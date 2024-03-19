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

  $sqldasar = mysql_query("SELECT * FROM katadasar WHERE kata='$katadasar'");
  $dtdasar = mysql_num_rows($sqldasar);
  if($dtdasar > 0 ){
    ?>
    <script type="text/javascript">
    alert("Kata Dasar Sudah ada di Database");
    document.location = "../index.php?mod=katadasar&pg=data_katadasar";
    </script>
    <?php
  }else{
 

    $query  = mysql_query("INSERT INTO katadasar values ('$kdkata','$katadasar','$pengertian')");
    $query2 = mysql_query("INSERT INTO imbuhan values('$kdimbuhan','$kdkata')");
    //awalan
    if (empty($awalan)){

    }else{
      mysql_query ("INSERT into awalan values('','$kdimbuhan','$awalan')");
    }
    
    //sisipan
    if (empty($sisipan)){

    }else{
      mysql_query ("INSERT into sisipan values('','$kdimbuhan','$sisipan')");
    }

    //akhiran
    if (empty($akhiran)){

    }else{
      mysql_query ("INSERT into akhiran values('','$kdimbuhan','$akhiran')");
    }

    //partikel
    if (empty($partikel)){

    }else{
      mysql_query ("INSERT into partikel values('','$kdimbuhan','$partikel')");
    }

    //kataganti
    if (empty($kataganti)){

    }else{
      mysql_query ("INSERT into kataganti values('','$kdimbuhan','$kataganti')");
    }
      
	  
      if ($query && $query2) {
       ?>
<script type="text/javascript">
alert("Berhasil menyimpan data");
document.location = "../index.php?mod=katadasar&pg=data_katadasar";
</script>
<?php
      }
      else{
        ?>
<script type="text/javascript">
alert("Data gagal disimpan");
document.location = "../index.php?mod=katadasar&pg=form_input_katadasar";
</script>
<?php 
      } 
    }
 
  mysql_close();
 ?>