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
function cari($keyword){

	$query = "SELECT * FROM obat WHERE
	 nama_obat LIKE '%$keyword%' OR 
	 klasifikasi_obat LIKE '%$keyword%' OR 
	 kegunaan_obat LIKE '%$keyword%' OR 
	 pemakaian LIKE '%$keyword%'  

	 ";
	 return query($query);
}
?>