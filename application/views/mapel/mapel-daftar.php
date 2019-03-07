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
			<h4>Data Mata Pelajaran</h4>
		</div>
		<a href='<?php echo base_url("Login/logout"); ?>'>Logout</a><br><br>
		<a href="<?php echo site_url('mapel_controller/tambah'); ?>">Tambah Data</a>
		<table>
			<tr>
				<th>No.</th>
				<th>Nama Mata Pelajaran</th>
				<th>KKM</th>
				<th colspan="2">Aksi</th>
			</tr>
			<?php 
				if( ! empty($mapel)){
					$no=1;
					foreach ($mapel as $row) {
			?>
				<tr>
					<td><?php echo $no++; ?></td>	
					<td> <?php echo $row->nama_mapel; ?></td>
					<td> <?php echo $row->kkm; ?></td>
					<td><a href="<?php echo site_url("kelas_controller/ubah/".$row->kode_mapel); ?>">Ubah</a></td>
					<td><a href="<?php echo site_url("kelas_controller/hapus/".$row->kode_mapel); ?>">Hapus</a></td>
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