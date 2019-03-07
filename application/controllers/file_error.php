public function uploadfile(){
	$this->load->library('upload');
		$nis = $_POST['nis']; 
		$kode_mapel = $_POST['kode_mapel']; 
		$data = array();
		$foto = $_FILES['foto']['name'];
		for($i = 0; $i < 6; $i++){
			$_FILES['file']['name'] = $_FILES['foto']['name'][$i];
			$_FILES['file']['type'] = $_FILES['foto']['type'][$i];
			$_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
			$_FILES['file']['error'] = $_FILES['foto']['error'][$i];
			$_FILES['file']['size'] = $_FILES['foto']['size'][$i];

			$uploadPath = './uploads/';
			$config['upload_path']          = $uploadPath;
		    $config['allowed_types']        = 'gif|jpg|png';

		    $this->load->library('upload', $config);
		    $this->upload->initialize($config);

		    if($this->upload->do_upload('file')){
		    	$imageData = $this->upload->data();
		    	$uploadImgData[$i]['foto'] = $imageData['file_name'];
		    }
		}

		if(!empty($uploadImgData)){
			$index = 0; // Set index array awal dengan 0
			foreach($nis as $datanis){ // Kita buat perulangan berdasarkan nis sampai data terakhir
			array_push($data, array(
				'nis'=>$datanis,
				'kode_mapel'=>$kode_mapel[$index],  // Ambil dan set data nama sesuai index array dari $index
				'foto'=>$uploadImgData[$index]['foto'],  // Ambil dan set data telepon sesuai index array dari $index
			));

			$index++;

		}
		var_dump($data);

	//     $sql = $this->nilai_model->uploadfile($data);
	//     if($sql){
	//     	echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('index.php/siswa')."';</script>";
	//     }else{
	//     	echo "<script>alert('Data gagal disimpan');window.location = '".base_url('index.php/siswa')."';</script>";
	// 	}
	}
	}