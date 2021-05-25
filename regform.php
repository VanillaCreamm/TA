<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script language="javascript">
	function f_del(id){
		location.href = "actionform.php?id="+id+"&cmd=delete";
	}

	function f_edit( nama, jenis_kelamin, telp, alamat, skills){
		document.getElementById('nama').value = nama;
		document.getElementById('jenis_kelamin').value = jenis_kelamin;
		document.getElementById('telp').value = telp;
		document.getElementById('alamat').value = alamat;
		document.getElementById('skills').value = skills;
		document.getElementById('cmd').value = "update";
		document.getElementById('cmd').innerHTML = "update";
	}
</script>
<body>
	<form action="actionform.php" method="GET">
		<table>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input type="text" name="nama" id="nama"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td class="td-skip1">
					<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L">Male
					<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P">Female
				</td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>:</td>
				<td><input type="tel" name="telp" id="telp"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><input type="text" name="alamat" id="alamat"></td>
			</tr>
			<tr>
				<td>Skills</td>
				<td>:</td>
				<td>
					<input type="checkbox" name="skills" id="skills" value="HTML">HTML
					<input type="checkbox" name="skills" id="skills" value="CSS">CSS
					<input type="checkbox" name="skills" id="skills" value="Javascript">Javascript
					<input type="checkbox" name="skills" id="skills" value="PHP">PHP
					<input type="checkbox" name="skills" id="skills" value="MYSQl">MYSQL
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="cmd" id="cmd" value="save"></td>
			</tr>
		</table>
		<table border="1">
			<tr>
				<td>No</td>
				<td>Name</td>
				<td>Gender</td>
				<td>Phone</td>
				<td>Address</td>
				<td>Skills</td>
				<td>Action</td>
			</tr>
			<?php 
			include "koneksi.php";

			$sql = "select * from ulangan1";
			$query = mysqli_query($conn, $sql) or die;

			$num = mysqli_num_rows($query);

			for($x=1; $x<=$num; $x++){
				$result = mysqli_fetch_array($query);
				$id = $result['id'];
				$nama = $result['nama'];
				$jenis_kelamin = $result['jenis_kelamin'];
				$telp = $result['telp'];
				$alamat = $result['alamat'];
				$skills = $result['skills'];
				?>
				<tr>
					<td><?php echo $x;?></td>
					<td><?php echo $nama;?></td>
					<td><?php echo $jenis_kelamin;?></td>
					<td><?php echo $telp;?></td>
					<td><?php echo $alamat;?></td>
					<td><?php echo $skills;?></td>
					<td>
						<input type="button" value="delete" onclick="f_del('<?php echo $id;?>')">
						<input type="button" value="edit" onclick="f_edit(<?php echo "'$nama', '$jenis_kelamin', '$telp', '$alamat', '$skills'";?>)">
					</td>
				</tr>
				<?php
			}
			?>
		</table>
	</form>
</body>
</html>