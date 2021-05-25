<?php 
include "koneksi.php";

$id = $_GET['id'];
$nama = $_GET['nama'];
$jenis_kelamin = $_GET['jenis_kelamin'];
$telp = $_GET['telp'];
$alamat = $_GET['alamat'];
$skills = $_GET['skills'];
$cmd = $_GET['cmd'];

if($cmd=='save'){
	$sql = "insert into ulangan1(nama, jenis_kelamin, telp, alamat, skills) values('$nama', '$jenis_kelamin', '$telp', '$alamat', '$skills')";
	$query = mysqli_query($conn, $sql) or die($sql);
}

elseif($cmd=='delete'){
	$sql = "delete from ulangan1 where id='$id'";
	$query = mysqli_query($conn, $sql) or die($sql);
}

elseif($cmd=='update'){
	$sql = "update ulangan1 set nama='$nama', jenis_kelamin='$jenis_kelamin', telp='$telp', alamat='$alamat', skills='$skills' where id='$id'";
	$query = mysqli_query($conn, $sql) or die($sql);
}

header("location: regform.php");
?>