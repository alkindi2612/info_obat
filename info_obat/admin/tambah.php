<?php 
session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'functions.php';
	if (isset($_POST["submit"])) {
		
		

		if(tambah($_POST) > 0 ){
			echo "<script> 
				alert('data berhasil ditambahkan');
				document.location.href = 'home.php';
			</script>";
		} else {
			echo "<script> 
				alert('data gagal ditambahkan');
				document.location.href = 'home.php';
			</script>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Tambah Data Obat</title>
	<style>
  body{
    background-color: lightblue;
  }
    label {
      display: block;
    }
    .container{
      width: 350px;
    }
  </style>
</head>
<body>
	<br><br><br>


	<h1 class="display-4 text-center">Tambah Data Obat</h1>

	<form action="" method="post" enctype="multipart/form-data">
<div class="container"
    <div class="form-group">
      <div>
		<div>
			<div>
				 <label class="form-label" for="nama_obat">nama obat : </label>
				 <input class="form-control" type="text" name="nama_obat" id="nama_obat" required>
			</div>
			<div>
				 <label class="form-label" for="klasifikasi_obat">Klasifikasi : </label>
				 <input class="form-control" type="text" name="klasifikasi_obat" id="klasifikasi_obat" required>
			</div>
			<div>
				 <label class="form-label" for="kegunaan_obat">kegunaan : </label>
				 <input class="form-control" type="text" name="kegunaan_obat" id="kegunaan_obat" required>
			</div>
			<div>
				 <label  for="gambar">Gambar : </label>
				 <input  type="file" name="gambar" id="gambar" >
			</div>
			<div>
				 <label class="form-label" for="pemakaian">pemakaian : </label>
				 <input class="form-control" type="text" name="pemakaian" id="pemakaian" required>
			</div>
			<br>
			<div>
				<button class="btn btn-primary btn-block" type="submit" name="submit">Tambah Data</button>
			</div>
		</div>

	</form>

</body>
</html>