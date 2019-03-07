
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sistem Pengolahan Nilai Siswa SD</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Style.css'); ?>">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/custom.js"></script> -->
<body>
  <div class="content">
    <div class="title">
      <h4>Input Data</h4>
    </div>
    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open_multipart("detail_siswa_controller/ubah/".$detail_siswa->kode_detail_siswa); ?>
      <div class="row">
        <div class="col-3">
          <label for="tahun_ajar">Tahun Ajar</label>
        </div>
        <div class="col-8">
        <select name="tahun_ajar">
            <option value="">Please Select</option>
            <?php
            $thn_skr = date('Y');
            for ($x = $thn_skr; $x <= 2050; $x++) {
                $thn_berikutnya = $x+1;
                $thn_ajar = $x ." \ ". $thn_berikutnya;
            ?>
                <option value="<?php echo $thn_ajar ?>" <?php if($detail_siswa->tahun_ajar == $thn_ajar ){ echo 'selected';} ?> ><?php echo $thn_ajar; ?></option>
            <?php
            }
            ?>
        </select>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <label for="nama_siswa">Nama Siswa </label>
        </div>
        <div class="col-8">
          <!-- <input type="text" id="siswa" autocomplete="off" name="siswa">        
           <ul role="menu" aria-labelledby="dropdownMenu"  id="dropdownsiswa"></ul> -->
           <select name="nis" id="nis">
            <?php
            foreach($siswa as $data){ 
              ?>
              <option value='<?php echo $data->nis ?>' <?php if($detail_siswa->nis == $data->nis ){ echo 'selected';} ?> ><?php echo $data->nis.' \ '.$data->nama_siswa ?></option>;
            <?php 
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
            ?>
              <option value='<?php echo $data->tingkat ?>' ><?php echo $data->tingkat ?></option>
            <?php
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
      <input type="text" name="kode_kelas" value ="<?php echo $detail_siswa->kode_kelas; ?>">
      <div class="row">
        <div class="col-3">
          <label for="semester">Semester </label>
        </div>
        <div class="col-8">
        <select name="semester" id="semester">
            <option value="1" <?php if($detail_siswa->semester == '1' ){ echo 'selected';} ?> >1</option>
            <option value="2" <?php if($detail_siswa->semester == '2' ){ echo 'selected';} ?> >2</option>
        </select>
        </div>
      </div>
        <input type="submit" name="submit" value="Ubah">
        <a href="<?php echo base_url('detail_siswa_controller'); ?>"><input type="button" value="Batal"></a>
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