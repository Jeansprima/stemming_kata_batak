	<link rel="stylesheet" href="css/menu.css"/>
		<link rel="stylesheet" href="css2/main.css"/>
		<link rel="stylesheet" href="css2/bgimg.css"/>
		<link rel="stylesheet" href="css2/font.css"/>
		<link rel="stylesheet" href="css2/font-awesome.min.css"/>
		<script type="text/javascript" src="js2/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="js2/main.js"></script>
<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">Login</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="index.php?mod=login"> Login</a></p>
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
								<h3 class="mb-30">LOGIN</h3>
								<form method="post" action="login/otentikasi.php" class="login-form">
				<div class="input-container">
					<i class="fa fa-envelope"></i>
					<input type="text" class="input" name="email" placeholder="Username"/>
				</div>
				<div class="input-container">
					<i class="fa fa-lock"></i>
					<input type="password"  id="login-password" class="input" maxlength="10" name="password" placeholder="Password"/>
					<i id="show-password" class="fa fa-eye"></i>
				</div>
			
				<input type="submit" name="login" value="Login" class="button"/>
				
			</form>
						</div>
					</div>
				  </div>
				</div>
			</div>
			<!-- End Align Area -->
