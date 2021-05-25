<?php
include "koneksi.php";

$nis = $_GET['nis'];
$nama = $_GET['nama'];
$kelas = $_GET['kelas'];
$cmd = $_GET['cmd'];

if($cmd=='save'){
	$sql = "insert into tbsiswa(nis, nama, kelas) values('$nis', '$nama', '$kelas')";
	$query = mysqli_query($conn, $sql) or die($sql);
}

elseif($cmd=='delete'){
	$sql = "delete from tbsiswa where nis='$nis'";
	$query = mysqli_query($conn, $sql) or die($sql);
}

elseif($cmd=='update'){
	$sql = "update tbsiswa set nis='$nis', nama='$nama', kelas='$kelas' where nis='$nis'";
	$query = mysqli_query($conn, $sql) or die($sql);
}
header("location: formcrud1.php");
?>