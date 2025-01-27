<!DOCTYPE html>
<html>
	<head>
		<title>GILACODING</title>
	</head>
	<body>
		<h1 align="center">JUDUL LAPORAN</h1><br/>
		<table width="70%" align="center" border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Barang</th>
					<th>Harga</th>
					<th>Deskripsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include('koneksi.php'); //memanggil file koneksi
				$datas = mysqli_query($koneksi, "SELECT * FROM barang") or die(mysqli_error($koneksi));
				//script untuk menampilkan data barang

				$no = 1;//untuk pengurutan nomor

				//melakukan perulangan
				while($row = mysqli_fetch_assoc($datas)) {
				?>	

				<tr>
					<td><?= $no; ?></td>
					<td><?= $row['nama']; //untuk menampilkan nama ?></td>
					<td>Rp <?= $row['harga']; ?></td>
					<td><?= $row['deskripsi']; ?></td>
				</tr>

				<?php $no++; } ?>
			</tbody>
		</table>
	</body>
	<script>
		window.print();
	</script>
</html>