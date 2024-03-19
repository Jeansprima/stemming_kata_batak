<?php
$idsuku= $_GET['idkata'];
$sql = mysql_query("select * from katadasar inner join imbuhan on katadasar.kdkata = imbuhan.kdkata where imbuhan.kdimbuhan='$idsuku'");
$data = mysql_fetch_array($sql);
?>

<div class="container">
    <h2 class="text-center">Edit Bahasa Batak</h2>
    <div class="box-body table-responsive">

        <form name="form" id="form" method="post" enctype="multipart/form-data" action="katadasar/edit_katadasar.php">
            <table id="example1" class="table table-bordered table-striped">
                <tr>
                    <?php
						$sqlkataawal = mysql_query("SELECT * FROM awalan where kdimbuhan='$idsuku'");
						$dtkataawal = mysql_fetch_array($sqlkataawal);

						$sqlkataakhir = mysql_query("SELECT * FROM akhiran where kdimbuhan='$idsuku'");
						$dtkataakhir = mysql_fetch_array($sqlkataakhir);

						$sqlkatasisipan = mysql_query("SELECT * FROM sisipan where kdimbuhan='$idsuku'");
						$dtkatasisipan = mysql_fetch_array($sqlkatasisipan);

						$sqlkatapartikel = mysql_query("SELECT * FROM partikel where kdimbuhan='$idsuku'");
						$dtkatapartikel = mysql_fetch_array($sqlkatapartikel);

						$sqlkataganti = mysql_query("SELECT * FROM kataganti where kdimbuhan='$idsuku'");
						$dtkataganti = mysql_fetch_array($sqlkataganti);
						?>
                    <td>Kata Dasar</td>
                    <td>:
                        <input type="text" name="katadasar" value="<?php echo $data ['kata'] ?>" class="form-control" />

                        <input type="hidden" name="<?php echo $data ['kdkata'] ?>" value="<?php echo $kdkata ?>"
                            class="form-control" />
                        <input type="hidden" name="kdimbuhan" value="<?php echo $idsuku ?>" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Awalan</td>
                    <td>:
                        <input type="text" name="awalan" value="<?php echo $dtkataawal ['awalan'] ?>"
                            class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Sisipan</td>
                    <td>:
                        <input type="text" name="sisipan" value="<?php echo $dtkatasisipan ['sisipan'] ?>"
                            class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Akhiran</td>
                    <td>:
                        <input type="text" value="<?php echo $dtkataakhir ['akhiran'] ?>" name="akhiran"
                            class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Partikel</td>
                    <td>:
                        <input type="text" name="partikel" value="<?php echo $dtkatapartikel ['partikel'] ?>"
                            class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Kata Ganti</td>
                    <td>:
                        <input type="text" name="kataganti" value="<?php echo $dtkataganti ['kataganti'] ?>"
                            class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Pengertian</td>
                    <td>:
                        <input type="text" name="pengertian" value="<?php echo $data ['pengertian'] ?>"
                            class="form-control" />
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