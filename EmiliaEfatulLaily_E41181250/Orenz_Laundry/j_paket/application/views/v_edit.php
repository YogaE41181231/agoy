<!DOCTYPE html>
<html>

<head>

	<title>Orenz Laundry</title>

</head>

<body>

	<center>
		<h1>Jenis Paket</h1>
		<h3>Edit</h3>
	</center>
	<!-- ini sebagai form yg menampilkan data yg akan di edit -->
	<?php foreach ($jenis_paket as $u) { ?>
		<form action="<?php echo base_url() . 'crud/update'; ?>" method="post">
			<table style="margin:20px auto;">
				<tr>
					<td>ID. Jenis Paket</td>
					<td>
						<input type="text" name="id_jenis_paket" value="<?php echo $u->id_jenis_paket ?>">
					</td>
				</tr>
				<tr>
					<td>Nama Jenis Paket</td>
					<td>
						<!-- mengambil data dari data base kolom nama jenis paket untuk dapat diisikan/diedit data baru -->
						<input type="text" name="nama_jenis_paket" value="<?php echo $u->nama_jenis_paket ?>">
					</td>
				</tr>

				<tr>
					<td></td>
					<td><input type="submit" value="Simpan"></td>
				</tr>
			</table>
		</form>
	<?php } ?>

</body>

</html>