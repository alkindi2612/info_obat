<?php 
require 'functions.php';

	if(isset($_POST["registrasi"])){

		if( registrasi($_POST) > 0 ) {
			echo "<script>alert('User Baru Berhasil Ditambahkan')</script>";
		} else {
			echo mysqli_error($kon);
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>

	<h1>Halaman Registrasi</h1>

	<form action="" method="post">

		<ul>
			<li>
				<label for="username">Username</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<label for="password2">konfirmasi password</label>
				<input type="password" name="password2" id="password2">
			</li>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama">
			</li><br>
			<li>
				<button type="submit" name="registrasi">Registrasi</button>
			</li>
		</ul>
		
	</form>

</body>
</html>