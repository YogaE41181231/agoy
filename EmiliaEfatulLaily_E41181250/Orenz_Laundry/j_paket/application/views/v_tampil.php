<!DOCTYPE html>
<html>

<head>

	<title>Orenz Laundry</title>

</head>

<body>

	<center>
		<h1>Jenis Paket</h1>
	</center>
	<!-- tambahkan link tambah pada function code ignitor anchor -->
	<center><?php echo anchor('crud/tambah', 'Tambahkan'); ?></center>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>ID. Jenis Paket</th>
			<th>Nama Jenis Paket</th>
			<th>Action</th>
		</tr>
		<?php
		$no = 1;
		//menampilkan data dari database tabel jenis_paket dgn ketentuan nama kolom yg diambil datanya yaitu nama_jenis_paket
		foreach ($jenis_paket as $u) {
			?>
			<tr>
				<td><?php echo $u->id_jenis_paket ?></td>
				<td><?php echo $u->nama_jenis_paket ?></td>

				<td>
					<!-- aksi untuk dapat menghapus data -->
					<?php echo anchor('crud/edit/' . $u->id_jenis_paket, 'Edit'); ?>

					<!-- tambahkan link hapus pada function code ignitor anchor, untuk menghapus data -->
					<?php echo anchor('crud/hapus/' . $u->id_jenis_paket, 'Del'); ?>


				</td>
			</tr>
		<?php } ?>
	</table>



</body>

</html>