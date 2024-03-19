<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/velonic/admin/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Oct 2015 06:31:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="../assets/front-end/images/favicon.ico">

        <title>Futsal Lampung</title>

        <!-- Google-Fonts -->
        <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,300,400,600,700,900,400italic' rel='stylesheet'>-->

        <!-- Bootstrap core CSS -->
        <link href="../assets/back-end/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/back-end/css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="../assets/back-end/css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="../assets/back-end/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/back-end/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

        <link href="../assets/back-end/assets/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="../assets/back-end/assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <!--Data tables css-->
        <link href="../assets/back-end/assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        
        <link href="../assets/back-end/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" />
        <link href="../assets/back-end/assets/summernote/summernote.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../assets/back-end/assets/morris/morris.css">

        <!-- sweet alerts -->
        <link href="../assets/back-end/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../assets/back-end/css/style.css" rel="stylesheet">
        <link href="../assets/back-end/css/helper.css" rel="stylesheet">
        <link href="../assets/back-end/css/style-responsive.css" rel="stylesheet" />

<script>
        /*  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-62751496-1', 'auto');
          ga('send', 'pageview'); */

        </script>


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>


    <body>
<!-- Aside Start-->
        <aside class="left-panel">

            <!-- brand -->
             <div class="logo">
                <a href="index-2.html" class="logo-expanded">
                    MItra</a>            </div>
             <!-- / brand -->
            <?php 
                $page = $_GET['mod'];
                if ($page == 'lapangan' ){
                    $lapangan = 'active';
                } else if ($page == 'Pemesanan') {
                    $pemesanan = 'active';
                } else if ($page == 'pembayaran') {
                    $pembayaran = 'active';
                } else if ($page == 'laporan') {
                    $laporan = 'active';
                } else {
                    $dashboard = 'active';
                }
            ?>
            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">
                    <li class="has-submenu <?php echo $dashboard?>"><a href="index.php"><i class="ion-home"></i> <span class="nav-label" style="font-size: 14px">BERANDA</span></a></li>
                    <?php
                        if ($level=='2'){
                    ?>
                    <li class="has-submenu <?php echo $lapangan?>"><a href="index.php?mod=lapangan&pg=data_lapangan"><i class="ion-document-text"></i> <span class="nav-label" style="font-size: 14px">LAPANGAN</span></a></li>
					<li class="has-submenu <?php echo $pemesanan?>"><a href="index.php?mod=pemesanan&pg=data_pemesanan"><i class="ion-document-text"></i> <span class="nav-label" style="font-size: 14px">PEMESANAN</span></a></li>
                 <li class="has-submenu <?php echo $pembayaran?>"><a href="index.php?mod=pembayaran&pg=data_pembayaran"><i class="ion-document-text"></i> <span class="nav-label" style="font-size: 14px">PEMBAYARAN</span></a></li>   
                   
                    <li class="has-submenu <?php echo $user?>"><a href="index.php?mod=user&pg=form_edit_user&id_user=<?php echo $_SESSION['iduser']?>"><i class="ion-person"></i> <span class="nav-label" style="font-size: 14px">UBAH PASSWORD </span></a></li>
 
                    <?php
                        }
                    ?>
                    

                    
                </ul>
            </nav>
                
        </aside>
        <!-- Aside Ends-->