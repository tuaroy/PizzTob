<?php
	session_start();
	include_once('config/koneksi.php');
	$id_user = $_SESSION['id_user'];
	$query = "SELECT * FROM cart WHERE id_user=$id_user";
	$result = mysqli_query($database,$query);
	$i = 1;
	
	//Tentang User
	$query3 = "SELECT * FROM register WHERE id=$id_user";
	$result3 = mysqli_query($database,$query3);
	$row3 = mysqli_fetch_assoc($result3);
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
	</head>
    <body>		
		<div id="top-bar" class="container">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="myaccount.php">Akun</a></li>
							<li><a href="cart.php">Keranjang</a></li>
							<li><a href="pembayaran.php">Pembayaran</a></li>
							<li><a href="logout_process.php">Logout</a></li>	
						</ul>
					</div>
				</div>
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
				<h4><span>Pembayaran</span></h4>
			</section>
            
            <div class="row">
            	<div class="span7">
                	<table class="table table-bordered table-striped">
                    	<tr>
                        	<th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                        </tr>
                        <?php
						while($row = mysqli_fetch_array($result)){
							$query1 = "SELECT * FROM item WHERE id=".$row['id_product'];
							$result1 = mysqli_query($database,$query1);
							$row1 = mysqli_fetch_assoc($result1);
						?>
                        <tr>
                        	<td><?php echo $i; ?></td>
                        	<td><img src="<?php echo $row['gambar'] ?>" style="width:150px; height:150px;"></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['jumlah'] ?></td>
                            <td><?php if($row1['jenis'] == "minuman"){
										echo "Minuman Biasa";
										}else{
											echo $row['ukuran'];
										}
							
						?></td>
                            <td><?php echo $row['harga'] ?></td>
                        </tr>
                        <?php
						 $i++;
						}
						?>
                    </table>
                </div>
                <div style="border-left:6px solid #FF0; background-color:#FFC;" class="span4">
                	<h4 class="text-center">Check Out</h4>
                    <form action="bayar.php" method="POST">
                    <table class="table table-bordered" style="font-weight:bold; font-size:13px;">
                    	<tr>
                        	<td>Harga Keseluruhan</td>
                            <?php
								$query2 = "SELECT * FROM total_harga WHERE id_user=$id_user";
								$result2 = mysqli_query($database,$query2);
								$row2 = mysqli_fetch_assoc($result2);
							?>
                            <td><?php echo $row2['harga']; ?></td>
                        </tr>
                        <tr>
                        	<td><label class="checkbox"><input type="checkbox" onChange="gunakanPoint()" id="checkPoint">Gunakan Point</label>
                            <div id="textPoint">
                            	<label>Point Anda : <p id="point"></p></label>
                                <label>1 Point = 500</label>
                                <label>Point yang ingin digunakan :</label>
                                <?php
								if($row3['point'] <= 0){
									echo '<input type="number" value="0" id="jumlahPoint" class="input-mini">';
								}else{
									echo '<input type="number" min="1" max="'.$row3['point'].'" value="1" id="jumlahPoint" class="input-mini" onChange="pakaiPoint(this.value)">';
								}
								?>
                                
                            </div>
                            <label id="pointKurang"></label>
                            </td>
                            <td><label id="totalPengurangan">----</label></td>
                        </tr>
                        <tr>
                        	<td>Harga Yang Harus Dibayar</td>
                            <td><input type="text" id="hargaDibayar" class="input-mini" value="<?php echo $row2['harga']; ?>" disabled></td>
                        </tr>
                    </table>
                    <div class="center">
                    	<input type="hidden" id="hargaDibayar1" class="input-mini" name="harga" value="<?php echo $row2['harga']; ?>">
                        <input type="hidden" id="pointBayar" class="input-mini" name="pointBayar" value="">
                    	<button class="btn btn-success" type="submit">Bayar</button>
                    </div>
                    </form>
                </div>
            </div>

        <div class="row feature_box">
            <div class="span4">
                <div class="service">
                    <div class="responsive">
                        <img src="themes/images/feature_img_2.png" alt="" />
                        <h4>TERMURAH <strong>SETOBASA</strong></h4>
                    </div>
                </div>
            </div>
            <div class="span4">	
                <div class="service">
                    <div class="customize">			
                        <img src="themes/images/feature_img_1.png" alt="" />
                        <h4>GRATIS <strong>ONGKIR</strong></h4>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="service">
                    <div class="support">	
                        <img src="themes/images/feature_img_3.png" alt="" />
                        <h4>24 JAM <strong>ONLINE</strong></h4>
                    </div>
                </div>
            </div>	
        </div>
        <section id="copyright" class="text-center">
            <h5>&copy Copyright 2017 Pizza Tobasa</h5><span>
        </section>
		</div>
		<script src="themes/js/common.js"></script>
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
				
				$("#point,#textPoint,#pointKurang").hide();
			});
			function gunakanPoint(){
				var point = <?php echo $row3['point']; ?>;
				if(point <= 0){
					if(document.getElementById("checkPoint").checked){
						$("#pointKurang").show();
						document.getElementById("pointKurang").innerHTML = "Point Tidak Cukup";
						document.getElementById("totalPengurangan").innerHTML = "----";
						document.getElementById("hargaDibayar").value = <?php echo $row2['harga']; ?>;
						document.getElementById("hargaDibayar1").value = <?php echo $row2['harga']; ?>;
					}else{
						$("#point,#textPoint,#pointKurang").hide();
					}
				}else{
					if(document.getElementById("checkPoint").checked){
						$("#point,#textPoint,#jumlahPoint").show();
						document.getElementById("point").innerHTML = point;
						pakaiPoint(document.getElementById("jumlahPoint").value);
					}else{
						$("#point,#textPoint,#pointKurang,#jumlahPoint").hide();
						document.getElementById("totalPengurangan").innerHTML = "----";
						document.getElementById("hargaDibayar").value = <?php echo $row2['harga']; ?>;
						document.getElementById("hargaDibayar1").value = <?php echo $row2['harga']; ?>;
					}
				}
			}
			function pakaiPoint(point){
				var pointKita = <?php echo $row3['point']; ?>;
				if(point > pointKita){
					document.getElementById("jumlahPoint").value = pointKita;
					point = pointKita;
				}
				var pengurangan = 500 * point;
				document.getElementById("totalPengurangan").innerHTML = "Total Pengurangan = "+pengurangan;
				
				var harga = <?php echo $row2['harga']; ?>;
				var bayar = harga - pengurangan;
				if(bayar <= 0){
					document.getElementById("hargaDibayar").value = 0;
					document.getElementById("hargaDibayar1").value = 0;
					document.getElementById("pointBayar").value = point;
				}else{
					document.getElementById("hargaDibayar").value = bayar;
					document.getElementById("hargaDibayar1").value = bayar;
					document.getElementById("pointBayar").value = point;
				}
			}
		</script>
    </body>
</html>