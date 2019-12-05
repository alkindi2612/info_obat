<?php 
session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'functions.php';

	$id = $_GET["id_obat"];

	$obat = query("SELECT * FROM obat WHERE id_obat = $id")[0];
	

	if (isset($_POST["submit"])) {
		
		
		if(edit($_POST) > 0 ){
			echo "<script> 
				alert('data berhasil diedit');
				document.location.href = 'home.php';
			</script>";
		} else {
			echo "<script> 
				alert('data gagal diedit');
				document.location.href = 'home.php';
			</script>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Obat</title>
</head>
<body>

	<h1>Edit Data Obat</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id_obat" value="<?= $obat["id_obat"]; ?>">
		<input type="hidden" name="gambarlama" value="<?= $obat["gambar"]; ?>">
		<ul>
			<li>
				 <label for="nama_obat">nama obat : </label>
				 <input type="text" name="nama_obat" id="nama_obat" required value="<?= $obat["nama_obat"]; ?>">
			</li>
			<li>
				 <label for="klasifikasi_obat">Klasifikasi : </label>
				 <input type="text" name="klasifikasi_obat" id="klasifikasi_obat" required value="<?= $obat["klasifikasi_obat"]; ?>">
			</li>
			<li>
				 <label for="kegunaan_obat">kegunaan : </label>
				 <input type="text" name="kegunaan_obat" id="kegunaan_obat" required value="<?= $obat["kegunaan_obat"]; ?>">
			</li>
			<li>
				 <label for="gambar">Gambar : </label><br>
				  <img src="img/<?= $obat['gambar']; ?>" width="120"><br>
				 <input type="file" name="gambar" id="gambar" >
			</li>
			<li>
				 <label for="pemakaian_obat">pemakaian : </label>
				 <input type="text" name="pemakaian" id="pemakaian" required value="<?= $obat["pemakaian"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Edit Data</button>
			</li>
		</ul>

	</form>

</body>
</html>