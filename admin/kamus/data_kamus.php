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
                   

                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="box-body table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Imbuhan</th>
                                            <th>Morfem</th>
                                            <th>Kata</th>
                                            <th>Kata Dasar</th>
                                            <th>Likelihood</th>
                                            <th>Pengertian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$sqlstramming = mysql_query("SELECT * FROM katadasar ");
									$no = 1 ;
									while($datastramming = mysql_fetch_array($sqlstramming)){
                                        $katacari = $datastramming['kata'];
                                        //proses likelihood
                                        $sqllike = mysql_query("SELECT * From hasil where dasar = '$katacari' ");
                                        $dtaa = mysql_fetch_array($sqllike);
                                        $sqljmllike = mysql_query("SELECT * From katadasar ");
                                        $dtjmllike  = mysql_num_rows($sqljmllike);
                                        $dtlike     = mysql_num_rows($sqllike);
                                        $smooting_factor = 0.5 ;
                                        $likelihood = ($dtlike + $smooting_factor ) / ( $dtjmllike + $smooting_factor) ;
                                        $katatt = $datastramming['kata'];
                                        $sqlkk = mysql_query("SELECT * FROM katadasar where kata='$katatt'");
                                        $dtkatt = mysql_fetch_array($sqlkk);
                                        if ($dtlike < 1){

                                        }else{
										?>

                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $dtaa['imbuhan'] ?></td>
                                            <td><?php echo $dtaa['morfem'] ?></td>
                                            <td><?php echo $datastramming['kata'] ?></td>
                                            <td><?php echo $dtaa['dasar'] ?></td>
                                            <td><?php echo ($likelihood) ?></td>
                                            <td><?php echo $dtkatt['pengertian'] ?></td>
                                        </tr>
                                        <?php } 
                                    } ?>
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