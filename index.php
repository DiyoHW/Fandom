<?php
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scalel=1">
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<style>
		header {
		background-color: #f13122;
		color: #fff;
		}

		.col-4 {
			width:25%;
			height:320px;
			border:1px solid #ccc;
			float: left;
			padding:10px;
			box-sizing: border_box;
			margin-bottom: 30px;
			color: #f13122
		}
		.col-4:hover {
			box-shadow: 0 0 3px #999;
			color: #f13122;
		}
		.col-4 img {
			width: 50%;
		}
		.col-4 .nama {
			color: #666;
			margin-bottom: 5px;
			font-size: 17px;
			align-items: center;
		}
		.col-4 .harga {
			font-weight: bold;
			color: #f13122 ;
			float: right;
		}	
	</style>
</head>
<body> 
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="index.php">FANDOM</a></h1>
			<ul>
				<li><a href="produk.php">Produk</a></li>
			</ul>
		</div>
	</header>
	
	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>
	
		<!-- new product -->
		<div class="section">
			<div class="container">
				<h3>Produk</h3>
				<div class="box">
				<?php
					$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_stock > 1 ORDER BY product_id DESC LIMIT 8");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				?>
					<a href="detail-produk.php?id=<?php echo $p['product_id']?>">
						<div class="col-4">
							<img src="produk/<?php echo $p['product_image'] ?>">
							<p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
							<p class="harga">Rp. <?php echo number_format ($p['product_price']) ?></p>
						</div>
					</a>
						<?php }}else { ?>
						<p>Produk tidak ada</p>
					<?php } ?>
			</div>
		</div>
	</div>
	
	<!-- footer -->
	<div class="footer">
		<div class="container">
		<h4>Alamat</h4>
		<p><?php echo $a->admin_address ?></P>
		
		<h4>Email</h4>
		<p><?php echo $a->admin_email ?></P>
		
		<h4>No. Hp</h4>
		<p><?php echo $a->admin_telp ?></P>
		<small>Copyright &copy; 2022 Fandom.</small>
	</div>
	</div>
</body>
</html>