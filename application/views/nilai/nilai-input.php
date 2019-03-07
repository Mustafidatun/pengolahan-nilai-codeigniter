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
            <h4>Isi Nilai Siswa</h4>
          </div>
          <form method="post" action="<?php echo base_url("nilai_controller/simpannilai/$detail_guru->kode_detail_guru"); ?>">
            
            <div class="row">
              <div class="col-3">
                <label for="kelas">Kelas</label>
              </div>
              <div class="col-8" itext-large>
                <input class="itext-large" type="text" name="kelas" value="<?php echo $detail_guru->tingkat.' \ '.$detail_guru->nama_kelas; ?>" readonly>
              </div>
            </div>
          	<div class="row">
              <div class="col-3">
                <label for="nama_mapel">Nama Mata Pelajaran</label>
              </div>
              <div class="col-8">
                <input class="itext-large" type="text" name="nama_mapel" value="<?php echo rawurldecode($detail_guru->nama_mapel); ?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <label for="nama_guru">Pengajar</label>
              </div>
              <div class="col-8">
                <input class="itext-large"type="text" name="nama_guru" value="<?php echo rawurldecode($detail_guru->nama_guru); ?>" readonly>
              </div>
            </div>
          	<table>
				<tr>
					<th>No</th>
					<th>NIS</th>
					<th>Nama Siswa</th>
					<th>Tugas 1</th>
					<th>Tugas 2</th>
					<th>Tugas 3</th>
					<th>UTS</th>
					<th>UAS</th>
				</tr>
				<?php 
					$no = 1; 
          $index = 0;
          $count = 0;
					foreach($detail_siswa as $row){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->nis; ?></td>
					<td class="td-left"><?php echo $row->nama_siswa; ?></td>
					<input type="text" name="<?php echo "inputs[$index][kode_detail_siswa]" ?>" value="<?php echo $row->kode_detail_siswa; ?>" hidden>
					<input type="text" name="<?php echo "inputs[$index][kode_detail_guru]"?>" value="<?php echo $detail_guru->kode_detail_guru; ?>" hidden>
					<td><input class="itext-small" type="text" name="<?php echo "inputs[$index][tgs1]"?>" required></td>
					<td><input class="itext-small" type="text" name="<?php echo "inputs[$index][tgs2]"?>" required></td>
					<td><input class="itext-small" type="text" name="<?php echo "inputs[$index][tgs3]"?>" required></td>
					<td><input class="itext-small" type="text" name="<?php echo "inputs[$index][uts]"?>" required></td>
					<td><input class="itext-small" type="text" name="<?php echo "inputs[$index][uas]"?>" required></td>
				</tr>
				<?php 
					$index++;
				}
				?>
	        </table>
            <input class="button-edit" type="submit" name="save_addnilai" value="Next">
          </form>
  </div>
</body>
</html>
