<?php 

    include "../../inc/config.php";

    $id_suku = $_GET['id_kata'];

    
    $sqlimbuhan = mysql_query("SELECT * FROM imbuhan WHERE kdkata = '$id_suku'");
    $dtimbuhan  = mysql_fetch_array($sqlimbuhan);
    $kdibu = $dtimbuhan['kdimbuhan'];

    
    $query3 = mysql_query("DELETE  FROM awalan where kdimbuhan='$kdibu'");
    $query4 = mysql_query("DELETE  FROM sisipan where kdimbuhan='$kdibu'");
    $query5 = mysql_query("DELETE  FROM akhiran where kdimbuhan='$kdibu'");
    $query6 = mysql_query("DELETE  FROM partikel where kdimbuhan='$kdibu'");
    $query7 = mysql_query("DELETE  FROM kataganti where kdimbuhan='$kdibu'");
    $query2 = mysql_query("DELETE  FROM imbuhan where kdimbuhan='$kdibu'");
    $sql        = "DELETE FROM katadasar WHERE kdkata='$id_suku'";
    $query      = mysql_query($sql);

    echo "<script>document.location.href='../index.php?mod=katadasar&pg=data_katadasar'</script>";
 ?>