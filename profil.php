<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
						<?php
					  $kode = $_GET['id'];
					  $skl = mysql_query("select * from suku where kodesuku='$kode'");
					  $data = mysql_fetch_array($skl);
					  ?>
                            <h1 class="text-white">Profil Suku Batak</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="index.php?mod=Profil&id=<?php echo $kode ?>"> Profil</a></p>
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
					  <div class="col-lg-8 col-md-8">
                      
								<h3 class="mb-30">Profil Suku Batak <?php echo $data['namasuku'] ?></h3>
                                <img src="suku/<?php echo $data['foto']?>" width="30%" /><br />
                                <p align="justify"><?php echo $data['deskripsi'] ?>
								<br />
                                <h3 class="mb-30">Tabel Aksara Batak <?php echo $data['namasuku'] ?></h3>
                                 <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Simbol</th>
                                                    <th>Tranliterasi</th>
                                                    <th>Pengertian</th>
                                                    
			                                           </tr>
                                            </thead>
                                     
                                            <tbody>
                                            	<?php 
                                            		$sql = mysql_query("SELECT * FROM inasurat inner join suku on inasurat.kodesuku = suku.kodesuku where suku.kodesuku='$kode' order by suku.namasuku asc");
                                                    $no  = 1; 
                                            		while($data = mysql_fetch_array($sql)){
                                                          $kode           = $data['kodeina'];
														  $namasuku           = $data['namasuku'];
														  $simbol           = $data['simbol'];
														  $tranliterasi			= $data['tranliterasi'];
														  $pengertian			= $data['pengertian'];
                                                
                                            	?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><img src="inasurat/<?php echo $simbol ?>" width="30%" width="80%"  /></td>
                                                    <td><?php echo $tranliterasi ?></td>
                                                    <td><?php echo $pengertian ?></td>
                                                    
                                                      </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
						</div>
					</div>
				  </div>
				</div>
			</div>
			<!-- End Align Area -->
