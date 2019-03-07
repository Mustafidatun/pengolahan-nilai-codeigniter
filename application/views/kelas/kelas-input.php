
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sistem Pengolahan Nilai Siswa SD</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Style.css'); ?>">
<body>
  <div class="content">
    <div class="title">
      <h4>Input Data</h4>
    </div>
    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open_multipart("kelas_controller/tambah"); ?>
      <div class="row">
        <div class="col-3">
          <label for="nis">Tingkat </label>
        </div>
        <div class="col-8">
        <select name="tingkat" id="tingkat">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <label for="nama_siswa">Nama Kelas </label>
        </div>
        <div class="col-8">
          <input class="itext-large" type="text" name="nama_kelas" id="nama_kelas"required>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <label for="alamat">Nama Walikelas </label>
        </div>
        <div class="col-8">
        <select name="walikelas" id="walikelas">
            <?php 
                foreach ($guru as $row) {
            ?>
            <option value="<?php echo $row->nip; ?>"><?php echo $row->nama_guru; ?></option>
            <?php
                }
            ?>
        </select>
        </div>
      </div>
        <input type="submit" name="submit" value="Tambah Data">
        <a href="<?php echo base_url('kelas_controller'); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
</div>
</body>
</html>