<?php
	session_start();
	include_once('config/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Pizza Tobasa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
        <link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet" type="text/css" media="all" />
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
					<div class="account pull-right">
						<ul class="user-menu">	
							<?php
							if(isset($_SESSION['is_logged_in'])){
								$role = $_SESSION['role'];
								if($role == "admin"){
									echo '<li><a href="logout_process.php">Logout</a></li>';
								}
								elseif ($role == "user") {
									echo '<li><a href="myaccount.php">Akun</a></li>';
									echo '<li><a href="cart.php">Keranjang</a></li>';
									echo '<li><a href="pembayaran.php">Pembayaran</a></li>';
									echo '<li><a href="logout_process.php">Logout</a></li>';
								}
							}
							else{
								echo '<li><a href="#myModal4" data-toggle="modal" align="center">Login</a></li>';
								echo '<li><a href="register.php">Register</a></li>';	
							}
							?>
						</ul>
					</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="pizza.php">Pizza</a></li>													
							<li><a href="minuman.php">Minuman</a></li>							
						</ul>
					</nav>
				</div>
			</section>
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="themes/images/carousel/banner-1.jpg" alt="" />
							<div class="intro">
								<h1>Pizza Tobasa</h1>
								<p><span>Dapatkan Penambahan Point</span></p>
								<p><span>Untuk Setiap Pembelian</span></p>
							</div>
						</li>
						<li>
							<img src="themes/images/carousel/banner-2.jpg" alt="" />
							<div class="intro">
								<h1>Pizza Tobasa</h1>
								<p><span>Tukarkan Point Anda</span></p>
								<p><span>Untuk Mendapatkan Diskon</span></p>
							</div>
						</li>
					</ul>
				</div>			
			</section>
			<section class="header_text">
				<h3><b>SILAHKAN PILIH MENU YANG ANDA INGINKAN</b></h3>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Makanan <strong>Pizza</strong></span></span></span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<?php
											echo '<div class="active item">';
											echo '<ul class="thumbnails">';
											$query = "SELECT * FROM item WHERE jenis='pizza'";
											$result_set = $database->query($query);
											
											while($row = $result_set->fetch_assoc()){
												echo '<li class="span3">';
												echo '<div class="product-box">';
												echo '<span class="sale_tag"></span>';
												
												
												echo '<p><a href="product_detail.php?id='.$row['id'].'">';
												echo('<img src="'.$row['gambar'].'" alt="" style="width:342px; height:342px;">');
												echo '</a></p>';
												echo '<a href="product_detail.php?id='.$row['id'].'" class="title">'.$row['nama'].'</a><br/>';
												echo '<a href="product_detail.php?id='.$row['id'].'" class="category">'.$row['keterangan'].'</a><br>';
												echo '</div>';
												echo '</li>';
											}
											echo '</ul>';
											echo '</div>';
												
										?>
										</div>
								</div>
							</div>						
						</div>
						<br/>
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Minuman <strong>Tradisional</strong></span></span></span>
								</h4>
								<div id="myCarousel-2" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<?php
											echo '<div class="active item">';
											echo '<ul class="thumbnails">';
											$query1 = "SELECT * FROM item WHERE jenis='minuman'";
											$result_set1 = $database->query($query1);
											
											while($row1 = $result_set1->fetch_assoc()){
												echo '<li class="span3">';
												echo '<div class="product-box">';
												echo '<span class="sale_tag"></span>';
												
												echo '<p><a href="product_detail.php?id='.$row1['id'].'">';
												echo('<img src="'.$row1['gambar'].'" alt="" style="width:342px; height:342px;">');
												echo '</a></p>';
												echo '<a href="product_detail.php?id='.$row1['id'].'" class="title">'.$row1['nama'].'</a><br/>';
												echo '<a href="product_detail.php?id='.$row1['id'].'" class="category">'.$row1['keterangan'].'</a><br>';
												echo '</div>';
												echo '</li>';
												
												/*
												echo '<li class="span3">';
												echo '<div class="product-box">';
												echo '<span class="sale_tag"></span>';
												
												echo '<p><a href="product_detail.php?id='.$row['id'].'">';
												echo('<img src="'.$row['gambar'].'" alt="" style="width:342px; height:342px;">');
												echo '</a></p>';
												echo '<a href="product_detail.php?id='.$row['id'].'" class="title">'.$row['nama'].'</a><br/>';
												echo '<a href="product_detail.php?id='.$row['id'].'" class="category">'.$row['keterangan'].'</a><br>';
												echo '<a style="font-size:10px;" href="index_delete_process.php?id='.$row['id'].'" class="btn btn-danger">Hapus</a>';
												echo '</div>';
												echo '</li>';
												*/
											}

											echo '</ul>';
											echo '</div>';
												
										?>
									</div>
								</div>
							</div>						
						</div>
			</section>
			<section id="copyright" class="text-center">
				<h5>&copy Copyright @tua</h5>
			</section>
		</div>

		<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" >
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
									
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form action="loginprocess.php" method="post">
											<div class="sign-in">
												<h4>Username :</h4>
												<input type="text" placeholder='Username' name="username" value="" style="color: black">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" placeholder='Password' name="password" style="color: black">
											</div>

											<div class="sign-in">
												<button class="btn btn-success" type="submit">Login</button>
											</div>
											<h4>Belum punya akun? <a href="register.php"> Daftar Disini</a> </h4>											
										</form>
									</div>
									
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>


		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>