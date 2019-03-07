<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistem Pengolahan Nilai Siswa SD </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Style.css'); ?>">
</head>
<body>
	<div class="content">
		<div class="title">
			<h4>Data Kelas</h4>
		</div>
		<a href='<?php echo base_url("Login/logout"); ?>'>Logout</a><br><br>
		<a href="<?php echo site_url('kelas_controller/tambah'); ?>">Tambah Data</a>
		<table>
			<tr>
				<th>No.</th>
				<th>Tingkat</th>
				<th>Nama Kelas</th>
				<th>Nama Walikelas</th>
				<th colspan="2">Aksi</th>
			</tr>
			<?php 
				if( ! empty($kelas)){
					$no=1;
					foreach ($kelas as $row) {
			?>
				<tr>
					<td><?php echo $no++; ?></td>	
					<td> <?php echo $row->tingkat; ?></td>
					<td> <?php echo $row->nama_kelas; ?></td>
					<td> <?php echo $row->nama_guru; ?></td>
					<td><a href="<?php echo site_url("kelas_controller/ubah/".$row->kode_kelas); ?>">Ubah</a></td>
					<td><a href="<?php echo site_url("kelas_controller/hapus/".$row->kode_kelas); ?>">Hapus</a></td>
				</tr>
			<?php
				}
			}else{ 
			  echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
			}
			?>
		</table>
	</div>
</body>
</html>