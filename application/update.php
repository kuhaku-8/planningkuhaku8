<?php
	include "../config/preference.php";

	session_start();
	if (!isset($_SESSION['username'])){
		header ("location:../index.php");
	}

	$query = "select * from barang_akan_dibeli where id='".$mysqli->real_escape_string($_REQUEST['id'])."'limit 0,1";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	$id = $row['id'];
	$nama = $row['nama'];
	$harga = $row['harga'];
	$qty = $row['qty'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Ubah Barang</title>
	</head>
	<body>
		<form action='#' method='post'>
			<table>
				<tr>
					<td>Nama :</td>
					<td><input type="text" name="nama" value='<?php echo $nama; ?>' /></td>
				</tr>
				<tr>
					<td>Harga :</td>
					<td><input type="number" name="harga" value='<?php echo $harga; ?>'/></td>
				</tr>
				<tr>
					<td>Qty :</td>
					<td><input type="number" name="qty" value='<?php echo $qty; ?>'/></td>
				</tr>
				<tr>
					<td>
						<input type='hidden' name='id' value='<?php echo $id ?>' />
		                <input type='hidden' name='action' value='update' />
		                <input type='submit' value='Edit' onclick="return confirm('Yakin Ingin Mengubah <?php echo "$nama" ?>?')" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>