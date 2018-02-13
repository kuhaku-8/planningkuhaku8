<?php
	include "../config/preference.php";

	session_start();
	if (!isset($_SESSION['username'])){
		header ("location:../index.php");
	}

	$query = "select * from barang_punya where id='".$mysqli->real_escape_string($_REQUEST['id'])."'limit 0,1";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	$id = $row['id'];
	$nama = $row['nama'];
	$harga = $row['harga'];
	$qty = $row['qty'];
	$spek = $row['spek'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo "$nama" ?></title>
	</head>
	<body>
		<div><a href="./history.php">Kembali</a></div>
		<table>
			<tr>
				<td><?php echo "$nama" ?></td>
			</tr>
			<tr>
				<td><img src="../src/barang_punya/<?php echo "$id" ?>.jpg"  width="500px"></td>
			</tr>
			<tr>
				<td>
					<table width="100">
						<tr>
							<td>Rp</td>
							<td align="right"><?php echo number_format("$harga",0,",",".") ?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td><?php echo "$spek" ?></td>
			</tr>
		</table>
	</body>
</html>