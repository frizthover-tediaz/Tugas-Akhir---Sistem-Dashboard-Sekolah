<?php 

require "../../koneksi.php";

$nama = htmlspecialchars($_GET['nama']);
$cmd = htmlspecialchars($_GET['cmd']);
$id = htmlspecialchars($_GET['id']);

if( $cmd === 'save' ) :

	$sql = "INSERT INTO tbhari (nama) VALUES('$nama')";
	$query = mysqli_query($conn, $sql) or die ($sql);

else :

	$sql = "UPDATE tbhari SET 
	nama = '$nama'
	WHERE id = '$id'";
	$query = mysqli_query($conn, $sql) or die ($sql);

endif;


if (mysqli_affected_rows($conn) > 0) :

	echo "Berhasil Melakukan perubahan";

else :

	echo "Gagal Melakukan Perubahan";

endif;
