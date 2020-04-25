<!DOCTYPE html>
<html>

<head>

	<title>Orenz Laundry</title>

</head>

<body>

	<center>
		<h1>Jenis Paket</h1>
		<h3>Tambahkan</h3>
	</center>
	<!-- aksi dari form diarahkan ke metod tambah_aksi pada controller crud -->
	<form action="<?php echo base_url() . 'crud/tambah_aksi'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>ID. Jenis Paket</td>
				<td><input type="text" name="id_jenis_paket"></td>
			</tr>

			<tr>
				<!-- menginputkan data baru ke kolom nama jenis paket -->
				<td>Nama Jenis Paket</td>
				<td><input type="text" name="nama_jenis_paket"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>

</body>

</html>