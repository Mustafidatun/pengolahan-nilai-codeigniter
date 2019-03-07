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
			<h4>Data Siswa</h4>
		</div>
		<a href='<?php echo base_url("Login/logout"); ?>'>Logout</a><br><br>
		<a href="<?php echo site_url('siswa_controller/tambah'); ?>">Tambah Data</a>
		<table>
			<tr>
				<th>No.</th>
				<th>Nis</th>
				<th>Foto</th>
				<th>Nama Siswa</th>
				<th>Jenis Kelamin</th>    
				<th>Alamat</th>
				<th>Tempat Tanggal Lahir</th>
				<th>Agama</th>
				<th>Edit</th>
				<th colspan="2">Aksi</th>
				
			</tr>
			<?php 
				if( ! empty($siswa)){
					$no=1;
					foreach ($siswa as $row) {
			?>
				<tr>
					<td><?php echo $no++; ?></td>	
					<td> <?php echo $row->nis; ?></td>
					<td><img src='<?php echo base_url('uploads/'.$row->foto ) ?>' width='30' height='30'></td>
					<td> <?php echo $row->nama_siswa; ?></td>
					<td> <?php echo $row->jk; ?></td>
					<td> <?php echo $row->alamat; ?></td>
					<td> <?php echo $row->ttl; ?></td>
					<td> <?php echo $row->agama; ?></td>
					<td><a href="<?php echo site_url("siswa_controller/ubah/".$row->nis); ?>">Ubah</a></td>
					<td><a href="<?php echo site_url("siswa_controller/hapus/".$row->nis); ?>">Hapus</a></td>

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