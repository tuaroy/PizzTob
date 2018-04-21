<?php
	session_start();
	include_once('config/koneksi.php');
	$id_user = $_SESSION['id_user'];
	$sql = "SELECT * FROM cart WHERE id_user=$id_user";
	$result = mysqli_query($database,$sql);
	$i = 1;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Pizza Toba</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">	
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
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
				<h4><span>Shopping Cart</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">
					<div class="span12">					
						<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>
                                	<th>No</th>
									<th>Gambar</th>
									<th>Nama</th>
									<th>Jumlah</th>
									<th>Ukuran</th>
									<th>Total</th>
                                    <th>Hapus</th>
								</tr>
							</thead>
							<tbody>
                                <?php
								while($row = mysqli_fetch_assoc($result)){ //Punya cart
									$ukuran = $row['ukuran'];
									$query = "SELECT * FROM item WHERE id=".$row['id_product'];
									$result1 = mysqli_query($database,$query);
									$row1 = mysqli_fetch_assoc($result1);
								?>
                                <tr>
                                	<td><?php echo $i; ?></td>
                                	<td style="width:350px"><a href="product_detail.php?id=<?php echo $row['id_product'] ?>"><img alt="" src="<?php echo $row['gambar']; ?>"></a></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><input class="input-mini" type="number" name="jumlah<?php echo $i; ?>" id="jumlah<?php echo $i; ?>" min="1" value="<?php echo $row['jumlah']; ?>" onChange="hitungHargaJumlah(this.value,<?php echo $row['id']; ?>,<?php echo $i; ?>)"></td>
                                    <td>
                                    	<div <?php if($row1['jenis'] == 'minuman') echo 'hidden=""';?>>
                                        <select name="ukuran<?php echo $i; ?>" style="width:90px" id="ukuran<?php echo $i; ?>" onChange="hitungHargaUkuran(this.value,<?php echo $row['id']; ?>,<?php echo $i; ?>)">
                                            <option value="small" <?php if($ukuran=="small") echo 'selected'; ?>>Small</option>
                                            <option value="medium" <?php if($ukuran=="medium") echo 'selected'; ?>>Medium</option>
                                            <option value="large" <?php if($ukuran=="large") echo 'selected'; ?>>Large</option>
                                        </select>
                                        </div>
                                        <?php if($row1['jenis'] == 'minuman') echo "<p>Minuman Biasa</p>"; ?>
                                    </td>
                                    <td><p id="harga<?php echo $i; ?>"><?php echo $row["harga"]; ?></p></td>
                                    <td><a href="cart_delete_process.php?id=<?php echo $row['id']; ?>"><button style="font-size:13px" class="btn btn-warning">Hapus</button></a></td>
                                </tr>
                                <?php
									$i++;
								}
								?>
                                <tr>
                                	<td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><strong>Total :</strong></td>
                                    <?php
										$sql1 = "SELECT * FROM total_harga WHERE id_user=$id_user";
										$result2 = mysqli_query($database,$sql1);
										$row2 = mysqli_fetch_array($result2);
									?>
                                    <td><strong><p id="hargaTotal"><?php echo $row2['harga']; ?></p></strong></td>
                                    <td>&nbsp;</td>
                                </tr>
							</tbody>
						</table>
						<hr/>
						<p class="buttons center">
							<a href="index.php"><button class="btn btn-warning">Lanjut Belanja</button></a>
							<a href="pembayaran.php"><button class="btn btn-info" type="submit">Ke Pembayaran</button></a>
						</p>
					</div>
				</div>
			</section>			
			<section id="copyright" class="text-center">
				<h5>&copy Copyright @tua</h5><span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>
        <script type="text/javascript">
			function hitungHargaJumlah(jumlah,id,hargaKe){
				if (jumlah == "" || jumlah <= 0) {
					document.getElementById("harga"+hargaKe).innerHTML = 0;
					return;
				} else {
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("harga"+hargaKe).innerHTML = this.responseText;
							hitungHargaTotal(jumlah);
						}
					};
					var id_user = <?php echo $id_user; ?>;
					var ukuran = document.getElementById("ukuran"+hargaKe).value;
					xmlhttp.open("GET","cart_process_AJAX1.php?id="+id+"&jumlah="+jumlah+"&ukuran="+ukuran+"&id_user="+id_user,true);
					xmlhttp.send();
				}
			}
			function hitungHargaUkuran(ukuran,id,hargaKe) {
				if (ukuran == "") {
					document.getElementById("harga"+hargaKe).innerHTML = 0;
					return;
				} else { 
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("harga"+hargaKe).innerHTML = this.responseText;
							hitungHargaTotal(ukuran);
						}
					};
					var id_user = <?php echo $id_user; ?>;
					var jumlah = document.getElementById("jumlah"+hargaKe).value;
					xmlhttp.open("GET","cart_process_AJAX.php?id="+id+"&jumlah="+jumlah+"&ukuran="+ukuran+"&id_user="+id_user,true);
					xmlhttp.send();
				}
			}
			function hitungHargaTotal(value){
				if (value == "" || value == 0) {
					document.getElementById("hargaTotal").innerHTML = 0;
					return;
				} else { 
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("hargaTotal").innerHTML = this.responseText;
						}
					};
					var id_user = <?php echo $id_user; ?>;
					xmlhttp.open("GET","hitung_harga_total_AJAX.php?id_user="+id_user,true);
					xmlhttp.send();
				}
			}
		</script>
    </body>
</html>