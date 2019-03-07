
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
		<?php echo form_open_multipart("kelas_controller/ubah/".$kelas->kode_kelas); ?>
                <div class="row">
					<div class="col-3">
						<label for="tingkat">Tingkat </label>
					</div> 
					<div class="col-8">
						<select name="tingkat" id="tingkat">
                            <option value="1" <?php if($kelas->tingkat == '1'){ echo 'selected';} ?> >1</option>
                            <option value="2" <?php if($kelas->tingkat == '2'){ echo 'selected';} ?> >2</option>
                            <option value="3" <?php if($kelas->tingkat == '3'){ echo 'selected';} ?> >3</option>
                            <option value="4" <?php if($kelas->tingkat == '4'){ echo 'selected';} ?> >4</option>
                            <option value="5" <?php if($kelas->tingkat == '5'){ echo 'selected';} ?> >5</option>
                            <option value="6" <?php if($kelas->tingkat == '6'){ echo 'selected';} ?> >6</option>
                        </select>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label for="nama_kelas">Nama Kelas </label>
					</div>
					<div class="col-8">
						<input class="itext-large" type="text" name="nama_kelas" id="nama_kelas" value="<?php echo $kelas->nama_kelas; ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label for="walikelas">Nama Walikelas </label>
					</div>
					<div class="col-8">
						<select name="walikelas" id="walikelas">
                            <?php 
                                foreach ($guru as $row) {
                            ?>
                            <option value="<?php echo $row->nip; ?>" <?php if($kelas->walikelas == $row->nip){ echo 'selected';} ?> ><?php echo $row->nama_guru; ?></option>
                            <?php
                                }
                            ?>
                        </select>
					</div>
				</div>
				
				<input type="submit" name="submit" value="Ubah">
				<a href="<?php echo base_url('kelas_controller'); ?>"><input type="button" value="Batal"></a>
				<?php echo form_close(); ?>
			</div>
		</body>
		</html>