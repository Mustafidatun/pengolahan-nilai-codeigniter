<html>
  <head>
    <title>CRUD Codeigniter</title>
  </head>
  <body>
    
    <a href='<?php echo base_url("Login/logout"); ?>'>Logout</a><br><br>
    <a href='<?php echo site_url("detail_siswa_controller/tambah"); ?>'>Tambah Data</a><br><br>
    <table cellpadding="7">
      <tr>   
        <th>No.</th>
        <th>Tahun Ajar</th>
        <th>Nis</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>    
        <th>Semester</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php
      if( ! empty($detail_siswa)){
        $no = 1;
        foreach($detail_siswa as $row){
      ?>
      <tr>  
          <td><?php echo $no++; ?></td>
          <td><?php echo $row->tahun_ajar; ?></td>
          <td><?php echo $row->nis; ?></td>
          <td><?php echo $row->nama_siswa; ?></td>
          <td><?php echo $row->tingkat.' \ '.$row->nama_kelas; ?></td>
          <td><?php echo $row->semester; ?></td>
          <td><a href='<?php echo site_url("detail_siswa_controller/ubah/".$row->kode_detail_siswa); ?>'>Ubah</a></td>
          <td><a href='<?php echo site_url("detail_siswa_controller/hapus/".$row->kode_detail_siswa); ?>'>Hapus</a></td>
      </tr>
      <?php
        }
      }else{ 
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>
    </table>
  </body>
</html>