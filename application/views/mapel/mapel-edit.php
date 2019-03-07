
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
		<div style="color: red;"><?php echo validation_errors(); ?></div>
		<?php echo form_open_multipart("mapel_controller/ubah/".$mapel->kode_mapel); ?>
                <div class="row">
					<div class="col-3">
						<label for="nama_mapel">Nama Mata Pelajaran </label>
					</div> 
					<div class="col-8">
                    <input class="itext-large" type="text" name="nama_mapel" id="nama_mapel" value="<?php echo $mapel->nama_mapel; ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label for="kkm">KKM</label>
					</div>
					<div class="col-8">
						<input class="itext-large" type="text" name="kkm" id="kkm" value="<?php echo $kelas->kkm; ?>" required>
					</div>
				</div>
				<input type="submit" name="submit" value="Ubah">
				<a href="<?php echo base_url('mapel_controller'); ?>"><input type="button" value="Batal"></a>
				<?php echo form_close(); ?>
			</div>
		</body>
		</html>