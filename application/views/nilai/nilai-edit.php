<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistem Pengolahan Nilai Siswa SD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/style.css"/>
</head>
<body>
 	<div class="content">
	    <div class="title">
	      <h4>Edit Data Siswa</h4>
	    </div>
    	<form action="<?php echo base_url("nilai_controller/editnilaix/$nilai->kode_nilai"); ?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-3">
					<label for="nis">NIS</label>
				</div>
				<div class="col-8">
					<input class="itext-large" type="text" name="nisx" value="<?php echo $nilai->nis; ?>" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<label for="nama_siswa">Nama Siswa</label>
				</div>
				<div class="col-8">
					<input class="itext-large" type="text" name="nama_siswa" value="<?php echo $nilai->nama_siswa; ?>" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<label for="kelas">Kelas</label>
				</div>
				<div class="col-8">
					<input class="itext-large" type="text" name="kelas" value="<?php echo $nilai->tingkat.' \ '.$nilai->nama_kelas; ?>" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<label for="nama_mapel">Mata Pelajaran</label>
				</div>
				<div class="col-8">
					<input class="itext-large" type="text" name="nama_mapel" value="<?php echo $nilai->nama_mapel; ?>" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<label for="nama_guru">Pengajar</label>
				</div>
				<div class="col-8">
					<input class="itext-large" type="text" name="nama_guru" value="<?php echo $nilai->nama_guru; ?>" readonly>
				</div>
			</div>
			<table class="col-12">
				<tr>
					<th>Tugas 1</th>
					<th>Tugas 2</th>
					<th>Tugas 3</th>
					<th>UTS</th>
					<th>UAS</th>
					<th>Nilai Akhir</th>
					<th>Grade</th>
					<th>Gambar</th>
				</tr>
				<tr>
					<td><input class="itext-small" id="tgs1" onkeyup="hitung();" type="text" name="n_tgs1" value="<?php echo $nilai->tgs1; ?>" required></td>
					<td><input class="itext-small" id="tgs2" onkeyup="hitung();" type="text" name="n_tgs2" value="<?php echo $nilai->tgs2; ?>" required></td>
					<td><input class="itext-small" id="tgs3" onkeyup="hitung();" type="text" name="n_tgs3" value="<?php echo $nilai->tgs3; ?>" required></td>
					<td><input class="itext-small" id="uts" onkeyup="hitung();" type="text" name="n_uts" value="<?php echo $nilai->uts; ?>" required></td>
					<td><input class="itext-small" id="uas" onkeyup="hitung();" type="text" name="n_uas" value="<?php echo $nilai->uas; ?>" required></td>
					<td><input class="itext-small" id="na" type="text" name="na" readonly></td>
					<td><input class="itext-small" id="grade" type="text" name="grade" disabled></td>
					<td><figure>
						<p><img src='<?php echo base_url() ?>uploads/<?php echo $nilai->foto; ?>' width='85' height='70'></p>
						<figcaption><?php echo $nilai->foto; ?></figcaption>
						</figure>
						<center><input type="file" name="photo"></center>
					</td>
					<input type="hidden" name="oldphoto" value="<?php echo $nilai->foto; ?>">
				</tr>
			</table>
			<input class="button-edit" type="submit" name="submit" value="Ubah">
		</form>
	</div>
	<script>
		function hitung() {
	    var tgs1 = Math.round($("#tgs1").val());
	    var tgs2 = Math.round($("#tgs2").val());
	    var tgs3 = Math.round($("#tgs3").val());
	    var uts = Math.round($("#uts").val());
	    var uas = Math.round($("#uas").val());
	    var tugas = (tgs1 + tgs2 + tgs3) / 3;
	    var na = ((tugas * 30)/100) + ((uts * 30)/100) + ((uas * 40)/100);
	    $("#na").val(Math.ceil(na));
	    if(na >= 80 && na <=100){
			$("#grade").val("A");
		}else if(na >= 70 && na < 80){
			$("#grade").val("B");
		}else if(na >= 60 && na < 70){
			$("#grade").val("C");
		}else if(na >= 50 && na < 60){
			$("#grade").val("D");
		}else {
			$("#grade").val("E");
		}
	}
	</script>
	</body>
</html>