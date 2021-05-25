<?php
include "koneksi.php";

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];

$sql = "insert into tbsiswa(nis, nama, kelas)
		values($nis, $nama, $kelas)";
$query = mysqli_connect($con, $sql) or die("");


?>