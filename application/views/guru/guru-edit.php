<html>
  <head>
    <title>Form Ubah - CRUD Codeigniter</title>
  </head>
  <body>
    <h1>Form Ubah Data Guru</h1>
    <hr>
    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open_multipart("guru_controller/ubah/".$guru->nip); ?>
      <table cellpadding="8">
         <tr>
          <td>Nip</td>
          <td><input type="text" name="nip" value="<?php echo set_value('nip', $guru->nip); ?>" readonly></td>
        </tr>
        <tr>
          <td>Nama Guru</td>
          <td><input type="text" name="nama_guru" value="<?php echo set_value('nama_guru', $guru->nama_guru); ?>" ></td>
        </tr>   
        <tr>
          <td>Alamat Guru</td>
          <td><input type="text" name="alamat" value="<?php echo set_value('alamat', $guru->alamat); ?>"></td>
        </tr>
       <tr>
          <td>Jenis Kelamin</td>
          <td>
          <input type="radio" name="jk" value="laki-laki" <?php echo set_radio('jk', 'laki-laki', ($guru->jk == "laki-laki")? true : false); ?>> Laki-laki
          <input type="radio" name="jk" value="perempuan" <?php echo set_radio('jk', 'perempuan', ($guru->jk == "perempuan")? true : false); ?>> Perempuan
          </td>
        </tr>
        <tr>
          <td>ttl</td>
          <td><input type="text" name="ttl" value="<?php echo set_value('ttl', $guru->ttl); ?>"></td>
        </tr>
        <tr>
          <td>pendidikan</td>
          <td><input type="text" name="pendidikan" value="<?php echo set_value('pendidikan', $guru->pendidikan); ?>"></td>
        </tr>
        <tr>
          <td>No telp</td>
          <td><input type="text" name="no_telp" value="<?php echo set_value('no_telp', $guru->no_telp); ?>"></td>
        </tr>
        <tr>
          <td>Upload Foto</td>
          <td>
          <img src='<?php echo base_url('uploads/'.$guru->foto ) ?>' width='30' height='30'>
          <input type="hidden" name="oldphoto" value="<?php echo $guru->foto ?>">
          <input type="file" name="photo"><p><?php echo set_value('photo', $guru->foto); ?></p></td>
        </tr>
      </table>

      <input type="submit" name="submit" value="Ubah">
      <a href="<?php echo base_url('guru_controller'); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
  </body>
</html> 