<?php
$des = "Aku Bangun Tidur pagi" ;
$u = strlen($des) ;
$r = 0 ;
while ($u > -2){

        $hsl = substr($des,$r,1) ;
        if ($hsl == ' '){
            $otv  = substr($des,0,$r) ;
            $des   = substr($des,$r);
        
       
        }else if($u == -1){
            

        }
  
     
    $u-- ;
    $r++ ;
    
}
?>