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
      <h4>Upload Foto Siswa</h4>
    </div>
    <form method="post" action="<?php echo base_url("nilai_controller/do_upload"); ?>" enctype="multipart/form-data">
    
    <table class="col-12">
      <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Nilai Akhir</th>
        <th>Grade</th>
        <th>Foto</th>
      </tr>
      <?php
        $no=1;
        foreach($datanilai as $row){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row->nis; ?></td>
        <td class="td-left"><?php echo $row->nama_siswa; ?></td>
        <td><?php echo $row->na_mapel; ?></td>
        <td><?php echo $row->grade; ?></td>
        <input type="hidden" name="kode_nilai[]" value="<?php echo $row->kode_nilai; ?>">
        <td><input type="file" name="photo[]" multiple="multiple" required></td>
      </tr>
      <?php
       }
       ?>
    </table>
    <input type="submit" value="Simpan">
  </form>
</div>
</body>
</html>