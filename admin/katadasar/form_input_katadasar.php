<div class="container">
    <h2 class="text-center">Input Data Kata Suku Batak</h2>
    <div class="box-body table-responsive">

        <form name="form" id="form" method="post" enctype="multipart/form-data" action="katadasar/simpan_kata.php">
            <table id="example1" class="table table-bordered table-striped">
                <tr>
                    <td>Kata Dasar</td>
                    <td>:
                        <input type="text" name="katadasar" class="form-control" />
                        <?php
						$sqlkata = mysql_query("SELECT * FROM katadasar");
						$dtkata = mysql_num_rows($sqlkata);
						$kdkata = $dtkata + 1 ;

						$sqlimbuhan = mysql_query("SELECT * FROM imbuhan");
						$dtimbuhan = mysql_num_rows($sqlimbuhan);
						$kdimbuhan = $dtimbuhan + 1 ;
                        $tgl = date('mds');
						?>
                        <input type="hidden" name="kdkata" value="<?php echo $tgl ?>" class="form-control" />
                        <input type="hidden" name="kdimbuhan" value="<?php echo $kdimbuhan ?>" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Awalan</td>
                    <td>:
                        <input type="text" name="awalan" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Sisipan</td>
                    <td>:
                        <input type="text" name="sisipan" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Akhiran</td>
                    <td>:
                        <input type="text" name="akhiran" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Partikel</td>
                    <td>:
                        <input type="text" name="partikel" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Kata Ganti</td>
                    <td>:
                        <input type="text" name="kataganti" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Pengertian</td>
                    <td>:
                        <input type="text" name="pengertian" class="form-control" />
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td><input type="submit" name="Simpan" value="Simpan" /></td>
                </tr>
            </table>
        </form>
    </div><!-- /.box-body -->
</div>