<?php 

require "../../koneksi.php";

$id = htmlspecialchars($_GET['id']);
$kode = htmlspecialchars($_GET['kode']);
$nama = htmlspecialchars($_GET['nama']);
$hari = htmlspecialchars($_GET['hari']);
$jam = htmlspecialchars($_GET['jam']);
$cmd = htmlspecialchars($_GET['cmd']);


if( $cmd === 'save' ) :

	$sql = "INSERT INTO tbwaktu (kode, nama, hari, jam) VALUES('$kode','$nama','$hari','$jam')";
	$query = mysqli_query($conn, $sql) or die ($sql);

else :

	$sql = "UPDATE tbwaktu SET 
	kode = '$kode',
	nama = '$nama', 
	hari = '$hari',  
	jam = '$jam' 
	WHERE kode = '$id'";
	$query = mysqli_query($conn, $sql) or die ($sql);

endif;


if (mysqli_affected_rows($conn) > 0) :

	echo "Berhasil Melakukan perubahan";

else :

	echo "Gagal Melakukan Perubahan";

endif;