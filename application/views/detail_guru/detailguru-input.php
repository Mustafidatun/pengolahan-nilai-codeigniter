
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sistem Pengolahan Nilai Siswa SD</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Style.css'); ?>">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<body>
  <div class="content">
    <div class="title">
      <h4>Input Data</h4>
    </div>
    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open_multipart("detail_guru_controller/tambah"); ?>
      <div class="row">
        <div class="col-3">
          <label for="nama_siswa">Nama Guru </label>
        </div>
        <div class="col-8">
           <select name="nip" id="nip">
            <option value="">Pilih</option>
            <?php
            foreach($guru as $data){ 
              echo "<option value='".$data->nip."'>".$data->nip.' \ '.$data->nama_guru."</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <label for="nama_mapel">Nama Mata Pelajaran </label>
        </div>
        <div class="col-8">
           <select name="kode_mapel" id="kode_mapel">
            <option value="">Pilih</option>
            <?php
            foreach($mapel as $data){ 
              echo "<option value='".$data->kode_mapel."'>".$data->nama_mapel."</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <label for="tingkat">Tingkat </label>
        </div>
        <div class="col-8">
          <select name="tingkat" id="tingkat">
            <option value="">Pilih</option>
            <?php
            foreach($tingkat as $data){ 
              echo "<option value='".$data->tingkat."'>".$data->tingkat."</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <label for="nama_kelas">Nama Kelas </label>
        </div>
        <div class="col-8">
          <select name="nama_kelas" id="nama_kelas">
            <option value="">Pilih</option>
          </select>
        </div>
      </div>
        <input type="submit" name="submit" value="Tambah Data">
        <a href="<?php echo base_url('detail_guru_controller'); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
</div>


<script>
  $(document).ready(function(){
    $("#tingkat").change(function(){
      $("#nama_kelas").hide();
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/kelas_controller/listnamakelas"); ?>", // Isi dengan url/path file php yang dituju
        data: {tingkat : $("#tingkat").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#nama_kelas").html(response.list_nama_kelas).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>

</body>
</html>