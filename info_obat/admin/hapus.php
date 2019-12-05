<?php 
session_start();

if(!isset($_SESSION["login"])){
	header("Location: admin/login.php");
	exit;
}

require 'functions.php';

	$id_obat = $_GET["id_obat"];

	if ( hapus($id_obat) > 0) {
			echo "<script> 
				alert('data berhasil dihapus');
				document.location.href = 'home.php';
			</script>";
		} else {
			echo "<script> 
				alert('data gagal dihapus');
				document.location.href = 'home.php';
			</script>";
		}

?>