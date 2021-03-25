<?php 

require "../../koneksi.php";

$id = htmlspecialchars($_GET['id']);
$nis = htmlspecialchars($_GET['nis']);
$nama = htmlspecialchars($_GET['nama']);
$kelas = htmlspecialchars($_GET['kelas']);
$spp = htmlspecialchars($_GET['spp']);
$cmd = htmlspecialchars($_GET['cmd']);


if( $cmd === 'save' ) :

	$sql = "INSERT INTO tbsiswa (nis, nama, kelas, spp) VALUES('$nis','$nama','$kelas','$spp')";
	$query = mysqli_query($conn, $sql) or die ($sql);

else :

	$sql = "UPDATE tbsiswa SET 
	nis = '$nis',
	nama = '$nama', 
	kelas = '$kelas',  
	spp = '$spp' 
	WHERE nis = '$id'";
	$query = mysqli_query($conn, $sql) or die ($sql);

endif;


if (mysqli_affected_rows($conn) > 0) :

	echo "Berhasil Melakukan perubahan";

else :

	echo "Gagal Melakukan Perubahan";

endif;