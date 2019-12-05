<?php 
session_start();

 if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}
require 'functions.php';
$obat = query("SELECT * FROM obat");

	if (isset($_POST["submit"])) {
		$keyword = cari($_POST["keyword"]);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Obat</title>
</head>
<body>

	<a href="logout.php">Logout</a>

	<h1>Daftar Obat</h1>

	<a href="tambah.php">Tambah data obat</a>
	<br><br>

	<form action="" method="post">
		<input type="text" name="keyword" size="35" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off">
		<button type="submit" name="submit"> Cari </button>
		<br><br>
	</form>

	<table border="1" cellpadding="10" cellspacing="0">

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
			<th>pilihan</th>
		</tr>

		<?php $i = 1;?>
		<?php foreach($alkindi as $row):?>
		<tr>
			<td><?= $i;?></td>
			<td><?= $row["nama_obat"]; ?></td>
			<td><?= $row["klasifikasi_obat"]; ?></td>
			<td><?=  $row["kegunaan_obat"]; ?></td>
			<td><img src=" img/<?= $row["gambar"];  ?>" width = "170"></td>
			<td><?= $row["pemakaian"]; ?></td>
			<td><a href="edit.php?id_obat=<?= $row["id_obat"]; ?>">edit</a> |
			 	<a href="hapus.php?id_obat=<?= $row["id_obat"]; ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">hapus</a></td>
		</tr>
	<?php $i++;?>
	<?php endforeach;?>
	</table>

</body>
</html>