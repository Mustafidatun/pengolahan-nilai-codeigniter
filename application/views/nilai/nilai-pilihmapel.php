<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistem Pengolahan Nilai Siswa SD</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/style.css"/>
</head>
<body>
       <div class="content">
        <div class="title">
          <h4>Data Mata Pelajaran</h4>
        </div>
        <table class="col-12">
          <tr>
          	<th>No</th>
  					<th>Mata Pelajaran</th>
  					<th>Kelas</th>
  					<th>Nama Guru</th>
  					<th>Isi Nilai</th>
				  </tr>
							<?php 
							if( ! empty($pilihmapel)){
                $no=1;
                foreach($pilihmapel as $row){
              ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td class="td-left"><?php echo $row->nama_mapel;?></td>
							<td><?php echo $row->tingkat.' \ '.$row->nama_kelas; ?></td>
							<td class="td-left"><?php echo $row->nama_guru; ?></td>
							<td><a href="<?php echo base_url("nilai_controller/inputnilai/$row->kode_detail_guru/$row->kode_kelas"); ?>">Isi Nilai</a></td>
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