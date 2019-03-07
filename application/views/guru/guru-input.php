<html>
  <head>
    <title>Form Tambah - CRUD Codeigniter</title>
  </head>
  <body>
    <h1>Form Tambah Data Guru</h1>
    <hr>
    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open_multipart("guru_controller/tambah"); ?>
      <table cellpadding="8" >
        <tr>
          <td>Nip</td>
          <td><input type="text" name="nip" value="<?php echo set_value('nip'); ?>"></td>
        </tr>
        <tr>
          <td>Nama Guru</td>
          <td><input type="text" name="nama_guru" value="<?php echo set_value('nama_guru'); ?>"></td>
        </tr>
         <tr>
          <td>Alamat Guru</td>
          <td><input type="text" name="alamat" value="<?php echo set_value('alamat'); ?>"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
          <input type="radio" name="jk" value="laki-laki" <?php echo set_radio('jk', 'Laki-laki'); ?>> Laki-laki
          <input type="radio" name="jk" value="perempuan" <?php echo set_radio('jk', 'Perempuan'); ?>> Perempuan
          </td>
        </tr>
        <tr>
          <td>Tempat tanggal lahir</td>
          <td><input type="text" name="ttl" value="<?php echo set_value('ttl'); ?>"></td>
        </tr>
        <tr>
          <td>Pendidikan</td>
          <td><input type="text" name="pendidikan" value="<?php echo set_value('pendidikan'); ?>"></td>
        </tr>
        <tr>
          <td>Nomor telepon</td>
          <td><input type="text" name="no_telp" value="<?php echo set_value('no_telp'); ?>"></td>
        </tr>
        <tr>
          <td>Foto</td>
          <td>
          <input type="file" name="photo" value="<?php echo set_value('photo'); ?>"></td>
        </tr>
        
        
      </table>
        
      <hr>
      <input type="submit" name="submit" value="Simpan">
      <a href="<?php echo base_url('guru_controller'); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
  </body>
</html>