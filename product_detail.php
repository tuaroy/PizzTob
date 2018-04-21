<?php
	session_start();

	include_once('config/koneksi.php');
	
	$id = $_GET['id'];
	$query = 'SELECT * FROM item WHERE id='.$id;
	$result_set = $database->query($query);
	$row = mysqli_fetch_assoc($result_set);
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
		<link href="bootstrap/css/style.css" rel="stylesheet" type="text/css" media="all" />		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		<link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">

		
        <link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- global styles -->
		<link href="themes/css/main.css" rel="stylesheet"/>
		<link href="themes/css/jquery.fancybox.css" rel="stylesheet"/>
				
		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src="themes/js/jquery.fancybox.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<style>
		table td{
			font-size:13px;
			font-weight:bold;
		}
		</style>
	</head>
    <body>		
		<div id="top-bar" class="container">
					<div class="account pull-right">
						<ul class="user-menu">
							<?php
							if(isset($_SESSION['is_logged_in'])){
								$role = $_SESSION['role'];
								if ($role == "user") {
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
							<li><a href="pizza.php">Pizza</a>
							</li>													
							<li><a href="minuman.php">Minuman</a>
							</li>							
						</ul>
					</nav>
				</div>
			</section>
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Detail Produk</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								<?php echo('<img src="'.$row['gambar'].'" alt="" style="width:342px; height:342px;">'); ?>
							</div>
							<div class="span5">
                            <h4><strong>Detail</strong></h4>
                            <table>
                            	<tr>
                                	<td><strong>Nama</strong></td>
                                    <td>:</td>
                                    <td><?php echo $row['nama']; ?></td>
                                </tr>
                                <tr>
                                	<td><strong>Kode</strong></td>
                                    <td>:</td>
                                    <td><?php echo $row['id']; ?></td>
                                </tr>
                                <tr>
                                	<td><strong>Point</strong></td>
                                    <td>:</td>
                                    <td><?php echo $row['point']; ?></td>
                                </tr>
                                <tr>
                                	<td><strong>Stock</strong></td>
                                    <td>:</td>
                                    <td>Ready</td>
                                </tr>
                            </table>
								<h4><strong>Harga</strong></h4>
                                <?php if($row['jenis'] == 'minuman'){
									echo "<strong>@Perbuah : </strong>".$row['small'];
								}else{?>
                                <table>
                                	<tr>
                                    	<td><strong>Small</strong></td>
                                        <td>:</td>
                                        <td><?php echo $row['small']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Medium</strong></td>
                                        <td>:</td>
                                        <td><?php echo $row['medium']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Large</strong></td>
                                        <td>:</td>
                                        <td><?php echo $row['large']; ?></td>
                                    </tr>
                              	</table>
                                <?php
								}
								?>
							</div>
                            <div class="span5">
								<form class="form-inline" method="post" action="product_detail_process.php?id=<?php echo $row['id'];?>">
                                	<h4><strong>Masukkan Ke Keranjang</strong></h4>
									<label>Jumlah :</label>
									<input type="number" value="1" name="jumlah" class="input-mini" min="1">
                                    <div style="margin-top:6px; margin-bottom:6px;" <?php if($row['jenis'] == 'minuman') echo 'hidden=""'; ?>>
                                        <label>Ukuran :</label>
                                        <select class="input-medium" name="ukuran">
                                            <option value="small" selected>Small</option>
                                            <option value="medium">Medium</option>
                                            <option value="large">Large</option>
                                        </select>
                                    </div>
                                    <?php
                                    	if(isset($_SESSION['is_logged_in'])){
                                    		echo '<a href="cart.php"> <button class="btn btn-inverse" type="submit">Masukkan Ke Keranjang</button></a>';
                                    	}else{
                                    		echo '<a href="#myModal4" data-toggle="modal"><button class="btn btn-inverse">Masukkan Ke Keranjang</button></a>';
                                    	}
                                    ?>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="span12">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#home">Deskripsi</a></li>
									<li class=""><a href="#profile">Informasi Tambahan</a></li>
								</ul>							 
								<div class="tab-content">
									<div class="tab-pane active" id="home">
                                    	<?php echo $row['deskripsi']; ?>
                                    </div>
									<div class="tab-pane" id="profile">
										<table class="table table-striped shop_attributes">	
											<tbody>
												<tr class="">
													<th>Size</th>
													<td>Large, Medium, Small, X-Large</td>
												</tr>		
												<tr class="alt">
													<th>Colour</th>
													<td>Orange, Yellow</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>							
							</div>						
						</div>
					</div>
				</div>
			</section>			
			<section id="copyright" class="text-center">
				<h5>&copy Copyright 2017 @tua</h5>
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
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
    </body>
</html>