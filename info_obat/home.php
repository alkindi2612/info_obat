<?php 
require 'functions.php';

	if (isset($_POST["submit"])) {
		$obat =cari($_POST["keyword"]);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		body{
			background-color: silver;
		}
	</style>
	<title>Obat</title>
</head>
<body>

	

	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container"> 
  <a class="navbar-brand" href="#">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      	<a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    <form  action="" method="post" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" name="keyword" size="35" autofocus placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
    </form>
  </div>
  </div>
</nav>

<div class="jumbotron">
<div class="container text-center">
<h1 class="display-4">Daftar Obat</h1>
</div>
</div>


<div class="container">
	<table class="table table-dark ">

		<?php
		$alkindi = query("SELECT * FROM obat");
		?>

		<tr>
			<th>No</th>
			<th>nama</th>
			<th>klasifikasi</th>
			<th>kegunaan</th>
			<th>gambar</th>
			<th>pemakaian</th>
		</tr>

		<?php $i = 1;?>
		<?php foreach($alkindi as $row):?>
		<tr>
			<td><?= $i;?></td>
			<td><?= $row["nama_obat"]; ?></td>
			<td><?= $row["klasifikasi_obat"]; ?></td>
			<td><?=  $row["kegunaan_obat"]; ?></td>
			<td><img src=" admin/img/<?= $row["gambar"];  ?>" width = "170"></td>
			<td><?= $row["pemakaian"]; ?></td>
		</tr>
	<?php $i++;?>
	<?php endforeach;?>
	</table>
	</div>

</body>
</html>