<!DOCTYPE html>
<html>
<head>
	<title>RUANGTUTORIAL</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<body>
	<div class="container col-md-6 mt-4">
		<h1>TABEL RUANGTUTORIAL</h1>
		<div class="card">
			<div class="card-header bg-success text-white ">
				DATA BARANG <a href="tambah.php" class="btn btn-sm btn-primary float-right">Tambah</a> <a href="cetak.php" target="_blank" class="btn btn-sm btn-warning float-right">Cetak</a>
			</div>
			<div class="card-body">
				<form action='index.php' method="POST">
					<div class="row">
						<div class="col-lg-8">
							<input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan Nama Kelas' required /> 
	          			</div>
	          			<div class="col-lg-4">
							<input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> 
							<a href='index.php' class="btn btn-sm btn-success" >Refresh</i></a>
	          			</div>
	          		</div>
	          	</form>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Deskripsi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include('koneksi.php'); //memanggil file koneksi
							if(isset($_POST['qcari'])){
								$qcari  = $_POST['qcari'];
								$query1 = "SELECT * FROM barang WHERE nama LIKE '%$qcari%'";
								
							}else{
								$query1 ="SELECT * FROM barang";
							}
							$datas = mysqli_query($koneksi, $query1) or die(mysqli_error($koneksi));
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
						<td>
								<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
								<a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
						</td>
					</tr>

						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>