<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <?php
$indo ="";
$batak = "";
					
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
	if (empty($_POST["indo"]) or empty($_POST["batak"])) 
	{
		if (empty($_POST["indo"]))
		{
			$indo = "Bahasa Indo Tidak Boleh Kosong";
		}
		if (empty($_POST["batak"]))
		{
			$batak = "Tidak Boleh Kosong";
		}
	}else 
    {
		session_start();
		//tangkap data dari form login


		@$indo	= $_POST['indo'];
		@$batak 	= $_POST['batak'];

		//untuk mencegah sql injection
		//kita gunakan mysql_real_escape_string

		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// query cek
		$q = mysql_query("SELECT * from inasurat where pengertian='$indo' ");

		// tampil data
		$data = mysql_fetch_array($q);
		if(mysql_num_rows($q)==1){
	        $batak = $data ['tranliterasi'];
			
	    }
		else
		{
		?>
                <script type="text/javascript">
                alert("Kata yang anda cari belum terdaftar");
                document.location = 'index.php?mod=kamus';
                </script>
                <?php            
		}
		mysql_close();
	}
}
					  ?>
                <h1 class="text-white">Kamus Suku Batak</h1>
                <p class="text-white link-nav"><a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span>
                    <a href="index.php?mod=Profil&id=<?php echo $kode ?>"> Profil</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->


<!-- Start Button -->
<section class="button-area"></section>
<!-- End Button -->
<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">

        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h3 class="mb-30">Kamus Bahasa Batak</h3>
                    <form method="post" action="">
                        <?php
                        include "inc/config.php";
								$kata = $_POST['kata'];
                                //membuat kode stramming
									$sqlstr = mysql_query("SELECT * FROM stramming ");
									$dtstr = mysql_num_rows($sqlstr);
									$idstr = $dtstr + 1 ;
                                   
								?>
                        <div class="mt-10">
                            <div class="col-md-12">
                                <label for="fullname">Bahasa Batak Toba</label>

                                <textarea class="common-textarea form-control" name="kata" id="kata"
                                    placeholder="Bahasa Batak" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Bahasa Batak'" required><?php echo $kata ?></textarea>

                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary btn-block" value="Cari">

                            </div>
                        </div>
                        <div class="mt-12">
                            <div class="col-md-12">

                                <?php
								
									
					if (empty($kata)){
												   
					}else 
                    {
									
									//menyimpan data stramming
									$simpanstr = mysql_query("INSERT INTO stramming VALUES('$idstr','$kata')");
					    if($simpanstr)
                        {
							//preoses filter setiap kata
							$sql2 = mysql_query("SELECT * FROM stramming where id='$idstr'");
                            $dt2 = mysql_fetch_array($sql2);
                            $des = $dt2['deskripsi'];
                            $u = strlen($des);
                            $r = 0 ;
                            while ($u  >= -2) {
                                if (substr($des,$r,1) == ' '){
                                    $otv  = substr($des,0,$r) ;
                                    $des   = substr($des,$r);
                                    $r = 0 ;
                                    mysql_query("INSERT INTO stramming_filter VALUES('$idstr','$otv')");
                                }else if($u == -2){
                                    $otv   = substr($des,0,$r);
                                    mysql_query("INSERT INTO stramming_filter VALUES('$idstr','$des')");
                                }
                                $u-- ;
                                $r++ ;
                            }
                        }
                            //proses porter stremming
                            $sqlproses = mysql_query("SELECT * FROM stramming_filter where id = '$idstr' group by
                            dasar ");
                            while($dtproses = mysql_fetch_array($sqlproses)){
                                $id = $dtproses['id'];
                                $katar = $dtproses['dasar'];
                                if (substr($katar,0,1)== ' '){
                                $katap = substr($katar,1);
                                }else{
                                $katap = substr($katar,0);
                                }
                                mysql_query("INSERT INTO stramming_detail VALUES('$id','$katap')");
                            }

                            $sqlhasil = mysql_query("SELECT * FROM stramming_detail where id='$idstr' ");
                            while($dthasil = mysql_fetch_array($sqlhasil)){
                                $id = $dthasil['id'];
                                $katap = $dthasil['dasar'];
                                if(substr($katap,-6,6)=="nasida" ){
                                    $imbuhan = "kata ganti" ;
                                    $morfem = "nasida";
                                    $hasil = substr($katap,0,-6);
                                    }else if(substr($katap,0,4)=="hina" || substr($katap,0,4)=="Hina" ){
                                $imbuhan = "awalan" ;
                                $morfem = "hina-";
                                $hasil = substr($katap,4);
                                }else if(substr($katap,-4,4)=="nami" ){
                                $imbuhan = "kata ganti" ;
                                $morfem = "nami";
                                $hasil = substr($katap,0,-4);
                                }else if(substr($katap,0,3)=="mar" || substr($katap,0,3)=="Mar" ){
                                $imbuhan = "awalan" ;
                                $morfem = "mar-";
                                $hasil = substr($katap,3);
                                }else if(substr($katap,0,3)=="pan" || substr($katap,0,3)=="Pan"){
                                $imbuhan = "awalan" ;
                                $morfem = "pan-";
                                $hasil = substr($katap,3);
                                }else if(substr($katap,0,3)=="pam" || substr($katap,0,3)=="Pam" ){
                                $imbuhan = "awalan" ;
                                $morfem = "pam-";
                                $hasil = substr($katap,3);
                                }else if(substr($katap,0,3)=="par" || substr($katap,0,3)=="Par"){
                                $imbuhan = "awalan" ;
                                $morfem = "par-";
                                $hasil = substr($katap,3);
                                }else if(substr($katap,0,3)=="tar" || substr($katap,0,3)=="Tar"){
                                $imbuhan = "awalan" ;
                                $morfem = "tar-";
                                $hasil = substr($katap,3);
                                }else if(substr($katap,0,2)=="ma" || substr($katap,0,2)=="Ma"){
                                $imbuhan = "awalan" ;
                                $morfem = "ma-";
                                $hasil = substr($katap,2);
                                }else if(substr($katap,0,2)=="pa" || substr($katap,0,2)=="Pa"){
                                $imbuhan = "awalan" ;
                                $morfem = "pa-";
                                $hasil = substr($katap,2);
                                }else if(substr($katap,0,2)=="di" || substr($katap,0,2)=="Di"){
                                $imbuhan = "awalan" ;
                                $morfem = "di-";
                                $hasil = substr($katap,2);
                                }else if(substr($katap,0,2)=="ha" || substr($katap,0,2)=="Ha"){
                                $imbuhan = "awalan" ;
                                $morfem = "ha-";
                                $hasil = substr($katap,2);
                                }else if(substr($katap,0,2)=="hu" || substr($katap,0,2)=="Hu"){
                                $imbuhan = "awalan" ;
                                $morfem = "hu-";
                                $hasil = substr($katap,2);
                                }else if(substr($katap,0,2)=="tu" || substr($katap,0,2)=="Tu"){
                                $imbuhan = "awalan" ;
                                $morfem = "tu-";
                                $hasil = substr($katap,2);
                                }else if(substr($katap,0,2)=="um" || substr($katap,0,2)=="Um" ){
                                $imbuhan = "awalan" ;
                                $morfem = "um-";
                                $hasil = substr($katap,2);
                                }else if(substr($katap,0,2)=="si" || substr($katap,0,2)=="Si"){
                                $imbuhan = "awalan" ;
                                $morfem = "si-";
                                $hasil = substr($katap,2);
                                }else if(substr($katap,1,2)=="in" ){
                                $imbuhan = "sisipan" ;
                                $morfem = "-in-";
                                $hasil = substr($katap,0,1).substr($katap,3);
                                }else if(substr($katap,1,2)=="um" ){
                                $imbuhan = "sisipan" ;
                                $morfem = "-um-";
                                $hasil = substr($katap,0,1).substr($katap,3);
                                }else if(substr($katap,1,2)=="ar" ){
                                $imbuhan = "sisipan" ;
                                $morfem = "-ar-";
                                $hasil = substr($katap,0,1).substr($katap,3);
                                }else if(substr($katap,1,2)=="al" ){
                                $imbuhan = "sisipan" ;
                                $morfem = "-al-";
                                $hasil = substr($katap,0,1).substr($katap,3);
                                }else if(substr($katap,-3,3)=="hon" ){
                                $imbuhan = "akhiran" ;
                                $morfem = "-hon";
                                $hasil = substr($katap,0,-3);
                                }else if(substr($katap,-2,2)=="an" ){
                                $imbuhan = "akhiran" ;
                                $morfem = "-an";
                                $hasil = substr($katap,0,-2);
                                }else if(substr($katap,-2,2)=="on" ){
                                $imbuhan = "akhiran" ;
                                $morfem = "-on";
                                $hasil = substr($katap,0,-2);
                                }else if(substr($katap,-1,1)=="i" ){
                                $imbuhan = "akhiran" ;
                                $morfem = "-i";
                                $hasil = substr($katap,0,-1);
                                }else if(substr($katap,-2,2)=="hu" ){
                                $imbuhan = "kata ganti" ;
                                $morfem = "-hu";
                                $hasil = substr($katap,0,-2);
                                }else if(substr($katap,-2,2)=="na" ){
                                $imbuhan = "kata ganti" ;
                                $morfem = "na";
                                $hasil = substr($katap,0,-2);
                                }else if(substr($katap,-2,2)=="mu" ){
                                $imbuhan = "kata ganti" ;
                                $morfem = "mu";
                                $hasil = substr($katap,0,-2);
                                }else if(substr($katap,-2,2)=="ta" ){
                                $imbuhan = "kata ganti" ;
                                $morfem = "ta";
                                $hasil = substr($katap,0,-2);
                                }else if(substr($katap,-1,1)=="m" ){
                                $imbuhan = "kata ganti" ;
                                $morfem = "m";
                                $hasil = substr($katap,0,-1);
                                }else if(substr($katap,-2,2)=="do" ){
                                $imbuhan = "partikel" ;
                                $morfem = "do";
                                $hasil = substr($katap,0,-2);
                                }else if(substr($katap,-2,2)=="ma" ){
                                $imbuhan = "partikel" ;
                                $morfem = "ma";
                                $hasil = substr($katap,0,-2);
                                }else if(substr($katap,-2,2)=="pe" ){
                                $imbuhan = "partikel" ;
                                $morfem = "pe";
                                $hasil = substr($katap,0,-2);
                                }else {
                                    $imbuhan = "Tidak Mengandung Kata Berimbuhan" ;
                                    $morfem = "Tidak Mengandung Morfem";
                                    $hasil = "";
                                }

                                $sqlcari = mysql_query("SELECT * FROM katadasar where kata='$hasil'");
                                $ddtcari = mysql_fetch_array($sqlcari);
                                if (mysql_num_rows($sqlcari) == 1){
                                mysql_query("INSERT INTO hasil VALUES('$id','$imbuhan','$morfem','$katap','$hasil')");
                                }else {
                                    //proses stramming ke 2
                                    if(substr($hasil,0,4)=="hina" || substr($hasil,0,4)=="Hina" ){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & hina-";
                                    $hasil2 = substr($hasil,4);
                                    }else if(substr($hasil,0,3)=="mar" || substr($hasil,0,3)=="Mar" ){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & mar-";
                                    $hasil2 = substr($hasil,3);
                                    }else if(substr($hasil,0,3)=="pan" || substr($hasil,0,3)=="Pan"){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & pan-";
                                    $hasil2 = substr($hasil,3);
                                    }else if(substr($hasil,0,3)=="pam" || substr($hasil,0,3)=="Pam" ){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & pam-";
                                    $hasil2 = substr($hasil,3);
                                    }else if(substr($hasil,0,3)=="par" || substr($hasil,0,3)=="Par"){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & par-";
                                    $hasil2 = substr($hasil,3);
                                    }else if(substr($hasil,0,3)=="tar" || substr($hasil,0,3)=="Tar"){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & tar-";
                                    $hasil2 = substr($hasil,3);
                                    }else if(substr($hasil,0,2)=="ma" || substr($hasil,0,2)=="Ma"){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & ma-";
                                    $hasil2 = substr($hasil,2);
                                    }else if(substr($hasil,0,2)=="pa" || substr($hasil,0,2)=="Pa"){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & pa-";
                                    $hasil2 = substr($hasil,2);
                                    }else if(substr($hasil,0,2)=="di" || substr($hasil,0,2)=="Di"){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & di-";
                                    $hasil2 = substr($hasil,2);
                                    }else if(substr($hasil,0,2)=="ha" || substr($hasil,0,2)=="Ha"){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & ha-";
                                    $hasil2 = substr($hasil,2);
                                    }else if(substr($hasil,0,2)=="hu" || substr($hasil,0,2)=="Hu"){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & hu-";
                                    $hasil2 = substr($hasil,2);
                                    }else if(substr($hasil,0,2)=="tu" || substr($hasil,0,2)=="Tu"){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & tu-";
                                    $hasil2 = substr($hasil,2);
                                    }else if(substr($hasil,0,2)=="um" || substr($hasil,0,2)=="Um" ){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & um-";
                                    $hasil2 = substr($hasil,2);
                                    }else if(substr($hasil,0,2)=="si" || substr($hasil,0,2)=="Si"){
                                    $imbuhan2 = $imbuhan." & awalan" ;
                                    $morfem2 = $morfem." & si-";
                                    $hasil2 = substr($hasil,2);
                                    }else if(substr($hasil,1,2)=="in" ){
                                    $imbuhan2 = $imbuhan." & sisipan" ;
                                    $morfem2 = $morfem." & -in-";
                                    $hasil2 = substr($hasil,0,1).substr($hasil,3);
                                    }else if(substr($hasil,1,2)=="um" ){
                                    $imbuhan2 = $imbuhan." & sisipan" ;
                                    $morfem2 = $morfem." & -um-";
                                    $hasil2 = substr($hasil,0,1).substr($hasil,3);
                                    }else if(substr($hasil,1,2)=="ar" ){
                                    $imbuhan2 = $imbuhan." & sisipan" ;
                                    $morfem2 = $morfem." & -ar-";
                                    $hasil2 = substr($hasil,0,1).substr($hasil,3);
                                    }else if(substr($hasil,1,2)=="al" ){
                                    $imbuhan2 = $imbuhan." & sisipan" ;
                                    $morfem2 = $morfem." & -al-";
                                    $hasil2 = substr($hasil,0,1).substr($hasil,3);
                                    }else if(substr($hasil,-3,3)=="hon" ){
                                    $imbuhan2 = $imbuhan." & akhiran" ;
                                    $morfem2 = $morfem." & -hon";
                                    $hasil2 = substr($hasil,0,-3);
                                    }else if(substr($hasil,-2,2)=="an" ){
                                    $imbuhan2 = $imbuhan." & akhiran" ;
                                    $morfem2 = $morfem." & -an";
                                    $hasil2 = substr($hasil,0,-2);
                                    }else if(substr($hasil,-2,2)=="on" ){
                                    $imbuhan2 = $imbuhan." & akhiran" ;
                                    $morfem2 = $morfem." & -on";
                                    $hasil2 = substr($hasil,0,-2);
                                    }else if(substr($hasil,-1,1)=="i" ){
                                    $imbuhan2 = $imbuhan." & akhiran" ;
                                    $morfem2 = $morfem." & -i";
                                    $hasil2 = substr($hasil,0,-1);
                                    }else if(substr($hasil,-6,6)=="nasida" ){
                                    $imbuhan2 = $imbuhan." & kata ganti" ;
                                    $morfem2 = $morfem." & nasida";
                                    $hasil2 = substr($hasil,0,-6);
                                    }else if(substr($hasil,-4,4)=="nami" ){
                                    $imbuhan2 = $imbuhan." & kata ganti" ;
                                    $morfem2 = $morfem." & nami";
                                    $hasil2 = substr($hasil,0,-4);
                                    }else if(substr($hasil,-2,2)=="hu" ){
                                    $imbuhan2 = $imbuhan." & kata ganti" ;
                                    $morfem2 = $morfem." & -hu";
                                    $hasil2 = substr($hasil,0,-2);
                                    }else if(substr($hasil,-2,2)=="na" ){
                                    $imbuhan2 = $imbuhan." & kata ganti" ;
                                    $morfem2 = $morfem." & na";
                                    $hasil2 = substr($hasil,0,-2);
                                    }else if(substr($hasil,-2,2)=="mu" ){
                                    $imbuhan2 = $imbuhan." & kata ganti" ;
                                    $morfem2 = $morfem." & mu";
                                    $hasil2 = substr($hasil,0,-2);
                                    }else if(substr($hasil,-2,2)=="ta" ){
                                    $imbuhan2 = $imbuhan." & kata ganti" ;
                                    $morfem2 = $morfem." & ta";
                                    $hasil2 = substr($hasil,0,-2);
                                    }else if(substr($hasil,-1,1)=="m" ){
                                    $imbuhan2 = $imbuhan." & kata ganti" ;
                                    $morfem2 = $morfem." & m";
                                    $hasil2 = substr($hasil,0,-1);
                                    }else if(substr($hasil,-2,2)=="do" ){
                                    $imbuhan2 = $imbuhan." & partikel" ;
                                    $morfem2 = $morfem." & do";
                                    $hasil2 = substr($hasil,0,-2);
                                    }else if(substr($hasil,-2,2)=="ma" ){
                                    $imbuhan2 = $imbuhan." & partikel" ;
                                    $morfem2 = $morfem." & ma";
                                    $hasil2 = substr($hasil,0,-2);
                                    }else if(substr($hasil,-2,2)=="pe" ){
                                    $imbuhan2 = $imbuhan." & partikel" ;
                                    $morfem2 = $morfem." & pe";
                                    $hasil2 = substr($hasil,0,-2);
                                    }else {
                                    $imbuhan2 = " Tidak Mengandung Kata Berimbuhan " ;
                                    $morfem2 = " Tidak Mengandung Morfem ";
                                    $hasil2 = "";
                                    }
                                    $sqlcari1 = mysql_query("SELECT * FROM katadasar where kata='$hasil2'");
                                    $ddtcari1 = mysql_fetch_array($sqlcari1);
                                        mysql_query("INSERT INTO hasil
                                        VALUES('$id','$imbuhan2','$morfem2','$katap','$hasil2')");
                                     


                                }
                            }

                                ?>
                                <label for="fullname">Hasil Porter Stremming</label><br>
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Imbuhan</th>
                                            <th>Morfem</th>
                                            <th>Kata</th>
                                            <th>Kata Dasar</th>
                                               <th>Pengertian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$sqlstramming = mysql_query("SELECT * FROM hasil where id='$idstr'");
									$no = 1 ;
									while($datastramming = mysql_fetch_array($sqlstramming)){
                                        $katacari = $datastramming['kata'];
                                        //proses likelihood
                                        $sqllike = mysql_query("SELECT * From stramming_detail where dasar = '$katacari' and id='$idstr'");
                                        $sqljmllike = mysql_query("SELECT * From stramming_detail where  id='$idstr'");
                                        $dtjmllike  = mysql_num_rows($sqljmllike);
                                        $dtlike     = mysql_num_rows($sqllike);
                                        $likelihood = $dtlike / $dtjmllike ;
                                        $katatt = $datastramming['dasar'];
                                        $sqlkk = mysql_query("SELECT * FROM katadasar where kata='$katatt'");
                                        $dtkatt = mysql_fetch_array($sqlkk);
                                        $dthhh = mysql_num_rows($sqlkk);
                                       
										?>

                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $datastramming['imbuhan'] ?></td>
                                            <td><?php echo $datastramming['morfem'] ?></td>
                                            <td><?php echo $datastramming['kata'] ?></td>
                                            <td><?php echo $datastramming['dasar'] ?></td>
                                            <td><?php echo $dtkatt['pengertian'] ?></td>
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>


                                <?php } ?>
                            </div>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->