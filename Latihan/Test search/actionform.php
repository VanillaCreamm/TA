<?php 
include "koneksi.php";

$nama = $_GET['nama'];
$password = $_GET['password'];
$jenis_kelamin = $_GET['jenis_kelamin'];
$status = $_GET['status'];
$tanggal_lahir = $_GET['tanggal_lahir'];
$cmd = $_GET['cmd'];

if($cmd=='save'){
	$sql = "insert into tabel3(nama, password, jenis_kelamin, status, tanggal_lahir)
			values('$nama', '$password', '$jenis_kelamin', '$status', '$tanggal_lahir')";
}

elseif($cmd=='delete'){
	$sql = "delete from tabel3 where nama='$nama'";
}

elseif($cmd=='edit'){
	$sql = "update tabel3 set nama='$nama', password='$password', jenis_kelamin='$jenis_kelamin', status='$status', tanggal_lahir='$tanggal_lahir' where nama='	   $nama'";
}

$query = mysqli_query($conn, $sql) or die($sql);

header("location: formcrud3.php");
?>