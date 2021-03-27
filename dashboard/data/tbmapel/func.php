<?php 

require "../../koneksi.php";

$id = htmlspecialchars($_GET['id']);
$kode = htmlspecialchars($_GET['kode']);
$mapel = htmlspecialchars($_GET['mapel']);
$cmd = htmlspecialchars($_GET['cmd']);

if( $cmd === 'save' ) :

	$sql = "INSERT INTO tbmapel (kode, mapel) VALUES('$kode', '$mapel')";
	$query = mysqli_query($conn, $sql) or die ($sql);

else :

	$sql = "UPDATE tbmapel SET 
	kode = '$kode',
	mapel = '$mapel'
	WHERE id = '$id'";
	$query = mysqli_query($conn, $sql) or die ($sql);

endif;
