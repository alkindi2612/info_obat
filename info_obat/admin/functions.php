<?php 

$kon = mysqli_connect("localhost", "root", "", "info_obat");


function query($query){
	global $kon;
	$result = mysqli_query($kon, $query);
	$rows = [] ;
	while($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $kon;

		$nama_obat = htmlspecialchars($data["nama_obat"]);
		$klasifikasi_obat = htmlspecialchars($data["klasifikasi_obat"]);
		$kegunaan_obat = htmlspecialchars($data["kegunaan_obat"]);
		$pemakaian = htmlspecialchars($data["pemakaian"]);

		$gambar = upload();
		if(!$gambar){
			return false;
		}

		$query ="INSERT INTO obat VALUES ('', '$nama_obat','$klasifikasi_obat', '$kegunaan_obat', '$gambar', '$pemakaian')";

		mysqli_query($kon, $query);

		return mysqli_affected_rows($kon);
}

function upload(){

	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];

	if($error === 4) {
		echo "<script>alert('Silahkan Pilih Gambar Terlebih Dahulu!!!') </script>";

		return false;
	}

	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));

	if(!in_array($ekstensigambar, $ekstensigambarvalid)){
		echo "<script>alert('Yang Anda Upload Bukan Gambar')</script>";
		return false;
	}

	if($ukuranfile > 1000000 ) {
		echo "<script>alert('Ukuran Gambar Terlalu Besar')</script>";

		return false;
	}

	$namafilebaru  = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;

	move_uploaded_file($tmpname, 'img/'.$namafilebaru);

	return $namafilebaru;


} 


function hapus($id_obat){
		global $kon;
		mysqli_query($kon, "DELETE FROM obat WHERE id_obat = $id_obat");

		return mysqli_affected_rows($kon);
}


function edit($data){
	global $kon;

		$id_obat= $data["id_obat"];
		$nama_obat = htmlspecialchars($data["nama_obat"]);
		$klasifikasi_obat = htmlspecialchars($data["klasifikasi_obat"]);
		$kegunaan_obat = htmlspecialchars($data["kegunaan_obat"]);
		$gambarlama = htmlspecialchars($data["$gambarlama"]);

		if($_FILES['gambar'] ['error === 4']){
			$gambar = $gambarlama;
		} else {
			$gambar = upload();
		}
		
		$pemakaian = htmlspecialchars($data["pemakaian"]);

		$query ="UPDATE obat SET nama_obat = '$nama_obat',
									klasifikasi_obat = '$klasifikasi_obat',
		 							kegunaan_obat = '$kegunaan_obat',
		 							gambar = '$gambar',
		   							pemakaian = '$pemakaian'
		   	 						WHERE id_obat = '$id_obat'";


		mysqli_query($kon, $query);

		return mysqli_affected_rows($kon);

}


function cari($keyword){

	$query = "SELECT * FROM obat WHERE
	 nama_obat LIKE '%$keyword%' OR 
	 klasifikasi_obat LIKE '%$keyword%' OR 
	 kegunaan_obat LIKE '%$keyword%' OR 
	 pemakaian LIKE '%$keyword%'  

	 ";
	 return query($query);
}


function registrasi($data){
	global $kon;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($kon, $data["password"]);
	$password2 = mysqli_real_escape_string($kon, $data["password2"]);
	$nama = mysqli_real_escape_string($kon, $data["nama"]);

	$result = mysqli_query($kon, "SELECT username FROM admin WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo "<script> alert('Username Sudah Terdaftar') </script>";
		return false;
	}

	$password = password_hash($password, "PASSWORD_DEFAULT");

	if($password !== $password2){
		echo "<script>alert('Konfirmasi Password Tidak Sesuai')</script>";
		return false;
	}

	mysqli_query($kon, "INSERT INTO admin VALUES('', '$username', '$password', '$nama')");

	return mysqli_affected_rows($kon);
}

?>