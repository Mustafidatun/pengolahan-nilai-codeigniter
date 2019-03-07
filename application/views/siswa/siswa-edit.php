
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
		<?php echo form_open_multipart("siswa_controller/ubah/".$siswa->nis); ?>
				<div class="row">
					<div class="col-3">
						<label for="nis">Nis</label>
						<input class="itext-large" type="text" name="nis" id="nis" value=" <?php echo $siswa->nis; ?>" readonly>
					</div>
					<div class="col-8">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label for="nama_siswa">Nama Siswa </label>
					</div>
					<div class="col-8">
						<input class="itext-large" type="text" name="nama_siswa" id="nama_siswa" value=" <?php echo $siswa->nama_siswa; ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label for="alamat">Alamat </label>
					</div>
					<div class="col-8">
						<input class="itext-large" type="text" name="alamat" id="alamat"
						value="<?php echo $siswa->alamat; ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label for="jk">Jenis Kelamin </label>
					</div>
					<div class="col-8">
							<label class="container">Laki-laki
								<input type="radio" name="jk" value="laki-laki" <?php if($siswa->jk=="laki-laki"){ echo "checked"; }?>>
								<span class="checkmark"></span>
							</label>
							<label class="container">Perempuan
								<input type="radio" name="jk" value="perempuan" <?php if($siswa->jk=="perempuan"){ echo "checked"; }?>>
								<span class="checkmark"></span>
							</label>
					</div>
					<div class="row">
						<div class="col-3">
							<label for="ttl">Tempat Tanggal Lahir </label>
						</div>
						<div class="col-8">
							<input class="itext-large" type="text" name="ttl" id="ttl"value="<?php echo $siswa->ttl; ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<label for="agama">Agama </label>
						</div>
						<div class="col-8">
							<input class="itext-large" type="text" name="agama" id="agama" value="<?php echo $siswa->agama; ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<label for="Keterangan">Foto</label>
						</div>
						<div class="col-8">
							<img src='<?php echo base_url('uploads/'.$siswa->foto ) ?>' width='30' height='30'>
							<input type="hidden" name="oldphoto" value="<?php echo $siswa->foto ?>">
							<input type="file" name="photo"><p><?php echo set_value('photo', $siswa->foto); ?></p>
						</div>
					</div>
					<input type="submit" name="submit" value="Ubah">
				<a href="<?php echo base_url('siswa_controller'); ?>"><input type="button" value="Batal"></a>
				<?php echo form_close(); ?>
			</div>
		</body>
		</html>