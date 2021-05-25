<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script language="javascript">
	function f_del(nama){
		location.href = "actionform.php?nama="+nama+"&cmd=delete";
	}

	function f_edit(nama, password, jenis_kelamin, status, tanggal_lahir){
		document.getElementById('nama').value = nama;
		document.getElementById('password').value = password;
		document.getElementById('jenis_kelamin').value = jenis_kelamin;
		document.getElementById('status').value = status;
		document.getElementById('tanggal_lahir').date = tanggal_lahir;
        document.getElementById('cmd').value = 'update';
        document.getElementById('cmd').innetHTML = 'update';	
	}
</script>
<body>
	<form action="actionform.php" method="GET">
		<table border="0">
			<tr>
				<td><input type="text" name="cari"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" id="nama" placeholder="Inputkan Nama Anda"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="password" id="password" placeholder="Inputkan Password Anda"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki">Laki-laki
					<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">Perempuan
				</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td>
					<input type="checkbox" name="status" id="status" value="Menikah">Menikah
					<input type="checkbox" name="status" id="status" value="Belum Menikah">Belum Menikah
				</td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><input type="date" name="tanggal_lahir" id="tanggal_lahir"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="cmd" id="cmd" value="save"></td>
			</tr>
		</table>
		<table>
			<tr>
				<td>No</td>
				<td>Nama</td>
				<td>Password</td>
				<td>Jenis Kelamin</td>
				<td>Status</td>
				<td>Tanggal Lahir</td>
				<td>Action</td>
			</tr>
			<?php 
			include "koneksi.php";

			$sql = "select * from tabel3";
			$query = mysqli_query($conn, $sql) or die ($sql);

			$num = mysqli_num_rows($query);

			for($x=1; $x<=$num; $x++){
				$result = mysqli_fetch_array($query);
				$nama = $result['nama'];
				$password = $result['password'];
				$jenis_kelamin = $result['jenis_kelamin'];
				$status = $result['status'];
				$tanggal_lahir = $result['tanggal_lahir'];
				?>
				<tr>
					<td><?php echo $x;?></td>
					<td><?php echo $nama;?></td>
					<td><?php echo $password;?></td>
					<td><?php echo $jenis_kelamin;?></td>
					<td><?php echo $status;?></td>
					<td><?php echo $tanggal_lahir;?></td>
					<td>
						<input type="button" value="delete" onclick="f_del('<?php echo $nama;?>')">
						<input type="button" value="edit" onclick="f_edit(<?php echo "'$nama', '$password', '$jenis_kelamin', '$status', '$tanggal_lahir'";?>)">
					</td>
				</tr>
			<?php
			}
			?>
		</table>
	</form>
</body>
</html>