<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script language="javascript">
	function f_del(nis){
		location.href="savecrud.php?nis="+nis+"&cmd=delete";
	}

	function f_edit(nis, nama, kelas){
		document.getElementById('nis').value = nis;
		document.getElementById('nama').value = nama;
		document.getElementById('kelas').value = kelas;
		document.getElementById('cmd').value = "update";
		document.getElementById('cmd').innerHTML = "update";
	 }
</script>
<body>
	<form action="savecrud.php" method="GET">
		<table border="0">
			<tr>
				<td>NIS</td>
				<td>:</td>
				<td><input type="text" name="nis" id="nis" placeholder="Masukkan NIS anda"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" id="nama" placeholder="Masukkan Nama anda"></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td><input type="text" name="kelas" id="kelas" placeholder="Masukkan Kelas anda"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><button type="submit" id="cmd" name="cmd" value="save">save</button></td>
			</tr>
		</table>
		<table>
			<tr>
				<td>No</td>
				<td>NIS</td>
				<td>Nama</td>
				<td>Kelas</td>
				<td>Action</td>
			</tr>
		<?php 
			include "koneksi.php";
			$sql = "select * from tbsiswa";
			$query = mysqli_query($conn, $sql);
			$num = mysqli_num_rows($query);

			for($x=1; $x<=$num; $x++){
			$result = mysqli_fetch_array($query);
			$nis = $result['nis'];
			$nama = $result['nama'];
			$kelas = $result['kelas'];
			?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $nis; ?></td>
				<td><?php echo $nama; ?></td>
				<td><?php echo $kelas; ?></td>
				<td><input type="button" value="delete" onclick="f_del('<?php echo $nis;?>')"></td>
				<td><input type="button" value="edit" onclick="f_edit(<?php echo "'$nis', '$nama', '$kelas'";?>)"></td>
			</tr>
			<?php
			}
		?>

		</table>
	</form>
</body>
</html>