<html>
  <head>
    <title>CRUD Codeigniter</title>
  </head>
  <body>
    
    <a href='<?php echo base_url("Login/logout"); ?>'>Logout</a><br><br>
    <a href='<?php echo site_url("detail_guru_controller/tambah"); ?>'>Tambah Data</a><br><br>
    <table cellpadding="7">
      <tr>   
        <th>No.</th>
        <th>Kelas</th>
        <th>NIP</th>
        <th>Nama Guru</th>
        <th>Nama Mata Pelajaran</th>  
        <th colspan="2">Aksi</th>
      </tr>
      <?php
      if( ! empty($detail_guru)){
        $no = 1;
        foreach($detail_guru as $row){
      ?>
      <tr>  
          <td><?php echo $no++; ?></td>
          <td><?php echo $row->tingkat.' \ '.$row->nama_kelas; ?></td>
          <td><?php echo $row->nip; ?></td>
          <td><?php echo $row->nama_guru; ?></td>
          <td><?php echo $row->nama_mapel; ?></td>
          <td><a href='<?php echo site_url("detail_guru_controller/ubah/".$row->kode_detail_guru); ?>'>Ubah</a></td>
          <td><a href='<?php echo site_url("detail_guru_controller/hapus/".$row->kode_detail_guru); ?>'>Hapus</a></td>
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