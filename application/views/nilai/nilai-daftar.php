<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistem Pengolahan Nilai Siswa SD</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/style.css"/>
</head>
<body>
	<header>
        <div class="logo_admin">
            <a href="index.php"><h3>Sistem Pengolahan Nilai Siswa SD</h3></a>
        </div>
        <div class="h_right_admin">
            <div><?php echo $message;?></div>
			<div>Welcome <?php echo $username;?></div>
			<div><a href="<?php echo base_url('login/logout'); ?>">Logout</a></div>
    </header>
       <div class="content">
       	<div class="title">
       		<h4>Data Nilai</h4>
       		<a href="<?php echo base_url('nilai_controller/pilihmapelnilai'); ?>">Tambah Data</a>
       	</div>
        <table>
          <tr>
  			<th>No</th>
			<th>NIS</th>
			<th>Nama Siswa</th>
			<th>Kelas</th>
			<th>Mata Pelajaran</th>
			<th>Pengajar</th>
			<th>Tugas 1</th>
			<th>Tugas 2</th>
			<th>Tugas 3</th>
			<th>UTS</th>
			<th>UAS</th>
			<th>Nilai Akhir</th>
			<th>Grade</th>
			<th>Foto</th>
			<th>Edit</th>
		  </tr>
			<?php 
			if( ! empty($nilai)){
				$no=1;
				foreach($nilai as $row){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row->nis; ?></a></td>
				<td class="td-left"><?php echo $row->nama_siswa; ?></td>
				<td><?php echo $row->tingkat.' \ '.$row->nama_kelas; ?></td>
				<td class="td-left"><?php echo $row->nama_mapel; ?></td>
				<td class="td-left"><?php echo $row->nama_guru; ?></a></td>
				<td><?php echo $row->tgs1; ?></td>
				<td><?php echo $row->tgs2; ?></td>
				<td><?php echo $row->tgs3; ?></td>
				<td><?php echo $row->uts; ?></td>
				<td><?php echo $row->uas; ?></td>
				<td><?php echo $row->na_mapel; ?></td>
				<td><?php echo $row->grade; ?></td>
				<td><img src='<?php echo base_url() ?>uploads/<?php echo $row->foto; ?>' width='30' height='30'>
				</td>
				<td><a href="<?php echo base_url("nilai_controller/editnilaix/$row->kode_nilai"); ?>">Edit</a>
				</td>
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