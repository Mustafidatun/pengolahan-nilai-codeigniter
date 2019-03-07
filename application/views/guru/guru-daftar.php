<html>
  <head>
    <title>CRUD Codeigniter</title>
  </head>
  <body>
    
    <a href='<?php echo base_url("Login/logout"); ?>'>Logout</a><br><br>
    <a href='<?php echo site_url("guru_controller/tambah"); ?>'>Tambah Data</a><br><br>
    <table cellpadding="7">
      <tr>   
        <th>No.</th>
        <th>Foto</th>
        <th>Nip</th>
        <th>Nama guru</th>
        <th>Alamat</th>    
        <th>Jenis Kelamin</th>
        <th>Tempat Tanggal Lahir</th>
        <th>pendidikan</th>
        <th>No. Telp</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php
      if( ! empty($guru)){
        $no = 1;
        foreach($guru as $row){
      ?>
      <tr>  
          <td><?php echo $no++; ?></td>
          <td><img src='<?php echo base_url("uploads/".$row->foto); ?>' width='64'></td>
          <td><?php echo $row->nip; ?></td>
          <td><?php echo $row->nama_guru; ?></td>
          <td><?php echo $row->alamat; ?></td>
          <td><?php echo $row->jk; ?></td>
          <td><?php echo $row->ttl; ?></td>
          <td><?php echo $row->pendidikan; ?></td>
          <td><?php echo $row->no_telp; ?></td>       
          <td><a href='<?php echo site_url("guru_controller/ubah/".$row->nip); ?>'>Ubah</a></td>
          <td><a href='<?php echo site_url("guru_controller/hapus/".$row->nip); ?>'>Hapus</a></td>
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