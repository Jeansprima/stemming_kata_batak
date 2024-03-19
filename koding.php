<?php
	$sqlstramming = mysql_query("SELECT * FROM hasil where id='$idstr'");
	$no = 1 ;
		while($datastramming = mysql_fetch_array($sqlstramming)){
              $katacari = $datastramming['kata'];
              //proses likelihood
                      $sqllike = mysql_query("SELECT * From stramming_detail where dasar = $katacari' and id='$idstr'");
                      $sqljmllike = mysql_query("SELECT * From stramming_detail where  id='$idstr'");
                      $dtjmllike  = mysql_num_rows($sqljmllike);
                      $dtlike     = mysql_num_rows($sqllike);
                      $likelihood = $dtlike / $dtjmllike ;
                      $katatt     = $datastramming['dasar'];
                      $sqlkk      = mysql_query("SELECT * FROM katadasar where kata='$katatt'");
                      $dtkatt     = mysql_fetch_array($sqlkk);
                      echo (log10($likelihood)) ;

?>