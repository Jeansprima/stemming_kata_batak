<!-- Page Content Start -->
<!-- ================== -->

<div class="wraper container-fluid">
    <div class="page-title">
        <h3 class="title"><i class="fa fa-user"></i> Data Kata Dasar Suku Batak</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="text-align:right"><a
                            href="index.php?mod=katadasar&pg=form_input_katadasar"><button
                                class="btn btn-success m-b-5"> <i class="fa fa-plus"></i> <span>Tambah Data</span>
                            </button></a></h3>

                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="box-body table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kata Dasar</th>
                                            <th>Awalan</th>
                                            <th>Partikel</th>
                                            <th>Sisipan</th>
                                            <th>Akhiran</th>
                                            <th>Kata Ganti</th>
                                            <th>Pengertian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            		$sql = mysql_query("SELECT * FROM katadasar inner join imbuhan on katadasar.kdkata = imbuhan.kdkata order by kata asc");
                                                    $no  = 1; 
                                            		while($data = mysql_fetch_array($sql)){
                                              		 $kdimbuhan = $data ['kdimbuhan'];

                                                       //awalan
                                                       $sqlawal = mysql_query("SELECT * FROM awalan WHERE kdimbuhan='$kdimbuhan'");
                                                       $dataawal = mysql_fetch_array($sqlawal);

                                                       //sisipan
                                                       $sqlsisipan = mysql_query("SELECT * FROM sisipan WHERE kdimbuhan='$kdimbuhan'");
                                                       $datasisipan = mysql_fetch_array($sqlsisipan);

                                                       //akhiran
                                                       $sqlakhiran = mysql_query("SELECT * FROM akhiran WHERE kdimbuhan='$kdimbuhan'");
                                                       $dataakhiran = mysql_fetch_array($sqlakhiran);

                                                       //partikel
                                                       $sqlpartikel = mysql_query("SELECT * FROM partikel WHERE kdimbuhan='$kdimbuhan'");
                                                       $datapartikel = mysql_fetch_array($sqlpartikel);

                                                       //kataganti
                                                       $sqlkataganti = mysql_query("SELECT * FROM kataganti WHERE kdimbuhan='$kdimbuhan'");
                                                       $datakataganti = mysql_fetch_array($sqlkataganti);
                                            	?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data ['kata'] ?></td>
                                            <td><?php echo $dataawal['awalan'] ?></td>
                                            <td><?php echo $datapartikel['partikel'] ?></td>
                                            <td><?php echo $datasisipan['sisipan'] ?></td>
                                            <td><?php echo $dataakhiran['akhiran'] ?></td>
                                            <td><?php echo $datakataganti['kataganti'] ?></td>
                                            <td><?php echo $data['pengertian'] ?></td>
                                            <td>
                                                <a
                                                    href="index.php?mod=katadasar&pg=form_edit_katadasar&idkata=<?php echo $data['kdimbuhan'];?>"><button
                                                        class="btn btn-icon btn-info m-b-5"> <i class="fa fa-eye"></i>
                                                    </button></a>
                                                <?php
                                                            if ($akses=='1'){
                                                        ?>
                                                <a href="katadasar/hapus_kata.php?id_kata=<?php echo $data['kdkata'];?>"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?') "
                                                    ;><button class="btn btn-icon btn-danger m-b-5"> <i
                                                            class="fa fa-remove"></i> </button></a>
                                                <?php
                                                            }
                                                        ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End Row -->



</div>

s