<?php
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Pemesanan Fandom</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <style>
        .payment-form-container {
	        display: flex;
	        justify-content: center;
	        align-items: center;
	        height: 100vh;
        }

        .payment-form {
	        max-width: 400px;
	        padding: 20px;
	        border: 1px solid #ccc;
	        border-radius: 8px;
	        background-color: rgba(255, 255, 255, 0.8); /* Adjusted background color for better readability */
        }
        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
		header {
		    background-color: #f13122;
		    color: #fff;
	    }
    </style>
</head>
<body> 
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">FANDOM</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>
	
	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Formulir Pemesanan</h3>
            <div class="payment-form-container">
			    <div class="payment-form">
                <form action="" method="POST">
                    <label for="nama-lengkap">Nama Lengkap :</label>
                    <input type="text" id="nama-lengkap" name="nama" required>

                    <label for="alamat-lengkap">Alamat Lengkap :</label>
                    <input type="text" id="alamat-lengkap" name="alamat" required>

                    <label for="nomor-kartu">Kota / Kabupaten :</label>
                    <input type="text" id="kota-kabupaten" name="kotakabupaten" required>

                    <label for="provinsi">Provinsi :</label>
                    <input type="text" id="Provinsi" name="provinsi" required>

                    <label for="kode-pos">Kode Pos :</label>
                    <input type="text" id="kode-pos" name="kodepos" required>

                    <label for="no-handphone">No Handphone :</label>
                    <input type="text" id="no-handphone" name="nohp" required>

                    <label for="alamat-email">Alamat Email :</label>
                    <input type="text" id="alamat-email" name="email" required>

                    <label for="produk">Produk :</label>
                    <select id="produk" name="produk" required>
                        <option value="Butter - Fandom Parfume">Butter - Fandom Parfume</option>
                        <option value="Bulletproof - Fandom Parfume">Bulletproof - Fandom Parfume</option>
                        <option value="Euphoria - Fandom Parfume">Euphoria - Fandom Parfume</option>
                        <option value="Dynamite - Fandom Parfume">Dynamite - Fandom Parfume</option>
                        <option value="Idol - Fandom Parfume">Idol - Fandom Parfume</option>
                    </select>
                    <br>
                    <br>

                    <label for="options">Metode Pembayaran :</label>
                    <select id="options" name="metode">
                        <option value="option1">COD</option>
                        <option value="option2">BCA</option>
                        <option value="option3">BNI</option>
                        <option value="option4">Mandiri</option>
                    </select>

                    <button type="submit" name="submit" class="btn">Bayar</button>
                </form>
				<?php 
					if(isset($_POST['submit'])){
						
						$nama 		        = $_POST['nama'];
                        $alamatlengkap		= $_POST['alamat'];
                        $kotakabupaten	    = $_POST['kotakabupaten'];
                        $provinsi 		    = $_POST['provinsi'];
                        $kodepos		    = $_POST['kodepos'];
                        $nohp				= $_POST['nohp'];
                        $email				= $_POST['email'];
                        $metodepembayaran	= $_POST['metode'];
                        $produk             = $_POST['produk'];
						
						$insert = mysqli_query($conn, "INSERT INTO tb_form_pemesanan (id_pesanan, nama, alamat, kota_kabupaten, provinsi, kode_pos, no_hp, email, metode) VALUES (
											null,
                                            '$nama',
                                            '$alamatlengkap',
                                            '$kotakabupaten',
                                            '$provinsi',
                                            '$kodepos',
                                            '$nohp',
                                            '$email',
                                            '$metodepembayaran')");
						if($insert){
                            // Pesan WhatsApp
                            $pesanWhatsapp = "Selamat datang di Toko kami $nama ☺\n\n"
                                . "Kami sudah terima pesanan Anda dengan rincian sebagai berikut,\n"
                                . "Produk: $produk\n"
                                . "Dikirim ke:\n"
                                . "Nama: $nama\n"
                                . "No HP: $nohp\n"
                                . "Alamat: $alamatlengkap\n"
                                . "Kota: $kotakabupaten";
                            
                            // Encode pesan WhatsApp untuk URL
                            $pesanWhatsappEncoded = urlencode($pesanWhatsapp);

                            // URL WhatsApp
                            $urlWhatsapp = "https://api.whatsapp.com/send?phone=6281359604951&text=$pesanWhatsappEncoded";

                            // Redirect ke WhatsApp
                            echo "<script>window.location.href='$urlWhatsapp';</script>";

                            // Jangan lupa keluar dari script setelah melakukan redirect
                            exit();
						} else {
							echo '<script>alert("Gagal menambah data: ' . mysqli_error($conn) . '")</script>';
						}
					}
				?>
                </div>
			</div>
		</div>
	</div>
	
	<!-- footer -->
	<footer>
	    <div class="container">
		    <small>Copyright &copy; 2022 Fandom.</small>
	</footer>
</body>
</html>
