<?php 

require "../../koneksi.php";

$id = htmlspecialchars($_GET['id']);
$kode = htmlspecialchars($_GET['kode']);
$mapel = htmlspecialchars($_GET['mapel']);
$kategori = htmlspecialchars($_GET['kategori']);
$kkm = htmlspecialchars($_GET['kkm']);
$cmd = htmlspecialchars($_GET['cmd']);

if( $cmd === 'save' ) :

	$sql = "INSERT INTO tbmapel (kode, mapel, kategori, kkm) VALUES('$kode', '$mapel', '$kategori','$kkm')";
	$query = mysqli_query($conn, $sql) or die ($sql);

else :

	$sql = "UPDATE tbmapel SET 
	kode = '$kode',
	mapel = '$mapel', 
	kategori = '$kategori', 
	kkm = '$kkm'
	WHERE id = '$id'";
	$query = mysqli_query($conn, $sql) or die ($sql);

endif;
