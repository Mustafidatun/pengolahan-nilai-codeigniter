
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
    <?php echo form_open_multipart("siswa_controller/tambah"); ?>
      <div class="row">
        <div class="col-3">
          <label for="nis">Nis </label>
        </div>
        <div class="col-8">
          <input class="itext-large" type="text" name="nis" id="nis" placeholder="Contoh: 12345678"required>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <label for="nama_siswa">Nama Siswa </label>
        </div>
        <div class="col-8">
          <input class="itext-large" type="text" name="nama_siswa" id="nama_siswa"required>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <label for="alamat">Alamat </label>
        </div>
        <div class="col-8">
          <input class="itext-large" type="text" name="alamat" id="alamat"required>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <label for="jk">Jenis Kelamin </label>
        </div>
        <div class="col-8">
         <label class="container">Laki-laki
          <input type="radio" name="jk" value="laki-laki">
          <span class="checkmark"></span>
        </label>
        <label class="container">Perempuan
          <input type="radio" name="jk" value="perempuan">
          <span class="checkmark"></span>
        </label>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <label for="ttl">Tempat Tanggal Lahir </label>
      </div>
      <div class="col-8">
        <input class="itext-large" type="text" name="ttl" id="ttl"required>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <label for="agama">Agama </label>
      </div>
      <div class="col-8">
        <input class="itext-large" type="text" name="agama" id="agama"required>
      </div>
    <div class="row">
      <div class="col-3">
        <label for="kelas">Upload Foto </label>
      </div>
      <div class="col-8">
        <input type="file" name="photo" >
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        <input type="submit" name="submit" value="Tambah Data">
        <a href="<?php echo base_url('siswa_controller'); ?>"><input type="button" value="Batal"></a>
      </div>
    </div>
    <?php echo form_close(); ?>
</div>
</body>
</html>