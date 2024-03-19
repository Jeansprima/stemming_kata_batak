<?php 
	$sqlpengujung       = mysql_query("SELECT * FROM pengunjung");
	$sqlpelanggan    = mysql_query("SELECT count(idpelanggan) AS jumlah_pelanggan FROM pelanggan");
	$data_sdm      = mysql_fetch_array($sqlpengujung);
	$data_jadwal   = mysql_fetch_assoc($sqlpelanggan);

 ?>

			 <div class="wraper container-fluid">
                <div class="page-title"> 
                    <h3 class="title">Selamat Datang</h3> 
                </div>

                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-pink">
                            <i class="ion-person"></i> 
                            <h2 class="m-0 counter"><?php echo $data_sdm['jumlah'];?></h2>
                            <div>Jumlah Pengunjung WEB </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-purple">
                            <i class="ion-calendar"></i> 
                            <h2 class="m-0 counter"><?php echo $data_jadwal['jumlah_pelanggan'];?></h2>
                            <div>Jumlah Pengguna </div>
                        </div>
                    </div>
                    
                </div> <!-- end row -->

            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->
