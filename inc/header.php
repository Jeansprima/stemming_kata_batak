<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  

<!-- Mirrored from themes.3rdwavemedia.com/college-green/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Feb 2015 12:51:29 GMT -->
<head>
    <title>Sinar Kencana Abadi </title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="assets/front-end/images/favicon.ico">  
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>   -->
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/front-end/plugins/bootstrap/css/bootstrap.min.css">   
    <link rel="stylesheet" href="assets/front-end/plugins/bootstrap/css/dataTables.bootstrap.css">   
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="assets/front-end/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/front-end/plugins/flexslider/flexslider.css">
    <link href="assets/front-end/plugins/pretty-photo/css/prettyPhoto.css" rel="stylesheet" type="text/css"> 
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/front-end/css/styles.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
     /* (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-24707561-9', '3rdwavemedia.com');
      ga('send', 'pageview');
    */
    </script>
</head> 
<script language="javascript" type="text/javascript"> 
function windowClose() { 
window.open('','_parent',''); 
window.close();
} 
</script>
<body class="home-page">
    <div class="wrapper">
        <!-- ******HEADER****** --> 
        <header class="header" style="background-color:#00CCFF"> 
            <div class="header-main container">
                <h1 class="logo col-md-4 col-sm-4">
                    <a href="index-2.html"><img id="logo" src="assets/front-end/images/logo.png" alt="Logo"></a>
                </h1><!--//logo-->           
                <div class="info col-md-8 col-sm-8">
                   
                    <!--//contact-->
                </div><!--//info-->
            </div><!--//header-main-->
        </header><!--//header-->
        
        <!-- ******NAV****** -->
        <nav class="main-nav" role="navigation">
            <div class="container" >
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->      

                <?php
                    $pg = $_GET['pg'];
                    if ($pg=='daftar'){
                        $daftar = 'active';
                    } else if ($pg=='sejarah' || $pg=='visi'){
                        $tentang = 'active';
                    } else if ($pg=='sejarah' || $pg=='detail_berita' || $pg=='pendaftaran'|| $pg=='pengajar'|| $pg=='sarana'){
                        $informasi = 'active';
                    } else if ($pg=='mendaftar'){
                        $mendaftar = 'active';
                    } else if ($pg=='data_persyaratan'){
                        $persyaratan = 'active';
                    }   else if ($pg=='login'){
                        $login = 'active';
                    } else if ($pg=='profil'){
                        $profil = 'active';
                    } else {
                        $home = 'active';
                    }
                ?>      
                <div class="navbar-collapse collapse" id="navbar-collapse" >
                    <ul class="nav navbar-nav">
                        <li class="<?php echo $home?> nav-item"><a href="index.php">Beranda</a></li>
                        <?php
                            if (empty($level)){
                        ?>
                        <li class="<?php echo $tentang?> nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Tentang Kami <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?mod=page/sejarah&pg=sejarah">Sejarah</a></li>
                                <li><a href="index.php?mod=page/visi&pg=visi">Visi dan Misi</a></li>              
                            </ul>
                        </li>

                        <li class="<?php echo $informasi?> nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Informasi <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu"> 
                                <li><a href="index.php?mod=page/pendaftaran&pg=pendaftaran">Tata Cara Pendaftaran</a></li>                        
                            </ul>
                        </li>
                        <?php
                            } 
                        ?>
                        <li class="<?php echo $daftar?> nav-item"><a href="index.php?mod=page/daftar&pg=daftar">Pendaftaran Member</a></li> 

                        <?php
                            if (!empty($level)){
                        ?>
                        <li class="<?php echo $persyaratan?> nav-item"><a href="index.php?mod=page/persyaratan&pg=data_persyaratan">Persyaratan</a></li>
                        <li class="<?php echo $mendaftar?> nav-item"><a href="index.php?mod=page/mendaftar&pg=mendaftar">Sudah Mendaftar</a></li>
                        <li class="<?php echo $profil?> nav-item"><a href="index.php?mod=page/profil&pg=profil">Profil</a></li>
                        <?php
                            }
                        ?>
                        
                        <?php
                            if (empty($level)){
                        ?>
                        <li class="<?php echo $login?> nav-item"><a href="index.php?mod=page/login&pg=login">Login</a></li> 
                        <?php
                            } else {
                        ?>
                        <li class="<?php echo $login?> nav-item"><a href="page/login/logout.php">Logout</a></li>
                        <?php
                            }
                        ?>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </div><!--//container-->
        </nav><!--//main-nav-->
        
        <!-- ******CONTENT****** --> 
        <div class="content container">
