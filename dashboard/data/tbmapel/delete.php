<?php 

require "../../koneksi.php";

$id = $_GET['id'];


$sql = "DELETE FROM tbmapel WHERE id = '$id'";
$query = mysqli_query($conn,$sql) or die ($sql);

if (mysqli_affected_rows($conn) < 0) :

	echo "Gagal Melakukan Perubahan";

endif;
