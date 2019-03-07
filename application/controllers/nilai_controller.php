<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Nilai_controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('nilai_model');
		$this->load->model('detail_siswa_model');
		$this->load->model('detail_guru_model');
		$this->load->library('upload');
		$this->msg = $this->session->flashdata('message');
		$this->username = $this->session->userdata('username');		
		
		if (empty($this->username)){
			$this->session->set_flashdata('message','Login dulu');
			redirect('login');			
		}
	}

	public function index(){
		$data = array(
			'nilai' => $this->nilai_model->getnilai(),
			'message' => $this->msg,
			'username' => $this->username
		);
		$this->load->view('nilai/nilai-daftar', $data);
	}

	public function pilihmapelnilai(){
		$data['pilihmapel'] = $this->nilai_model->pilihmapel();
		$this->load->view('nilai/nilai-pilihmapel', $data);
	}

	public function inputnilai($kode_detail_guru, $kode_kelas){
		$data = array(
			'detail_siswa' => $this->detail_siswa_model->listdetailsiswa($kode_kelas),
			'detail_guru' => $this->detail_guru_model->dtdetailguru($kode_detail_guru)
		);
		$this->load->view('nilai/nilai-input', $data);
	}

	public function simpannilai($kode_detail_guru){
		$datanilai_array = $this->input->post('inputs');
		$this->nilai_model->tambah($datanilai_array);

		$data['datanilai'] = $this->nilai_model->tampilnilaiakhir($kode_detail_guru);
		$this->load->view('nilai/nilai-upload', $data);
	}

	public function editnilaix($kode_nilai=''){
		if($this->input->post('submit')){ 
			// $data = array(
			// 	'kode_nilai' => $kode_nilai,
			// 	'tgs1' => $this->input->post('n_tgs1'),
			// 	'tgs2' => $this->input->post('n_tgs2'),
			// 	'tgs3' => $this->input->post('n_tgs3'),
			// 	'uts' => $this->input->post('n_uts'),
			// 	'uas' => $this->input->post('n_uas')
			// );
			$kode_nilai = $kode_nilai;
			$tgs1 = $this->input->post('n_tgs1');
			$tgs2 = $this->input->post('n_tgs2');
			$tgs3 = $this->input->post('n_tgs3');
			$uts = $this->input->post('n_uts');
			$uas = $this->input->post('n_uas');

			if (!empty($_FILES['photo']['name'])) {
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'jpg|jpeg|png|gif';
				$config['max_size']             = 1024;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (! $this->upload->do_upload('photo')){
					$error = array('error' => $this->upload->display_errors());
					redirect('nilai_controller/editnilaix/'.$kode_nilai);
				}else{
					$upload_data = $this->upload->data();
					$foto = $upload_data['file_name'];
					var_dump($data);
					$this->nilai_model->simpannilai($kode_nilai, $tgs1, $tgs2, $tgs3, $uts, $uas, $foto);

					unlink("./uploads/".$this->input->post('oldphoto'));
					redirect('nilai_controller');
				}
			}else{
					$foto = $this->input->post('oldphoto');
					$this->nilai_model->simpannilai($kode_nilai, $tgs1, $tgs2, $tgs3, $uts, $uas, $foto);
					redirect('nilai_controller');
				}		
		}else{	
			$data['nilai'] = $this->nilai_model->getnilai($kode_nilai);
			$this->load->view('nilai/nilai-edit', $data);	
		}
	}

	public function do_upload(){
	    $this->load->library('upload');
	    $kode_nilai = $_POST['kode_nilai']; 
	    $data = array();
	    $photo = count($_FILES['photo']['name']);
    
    for($i = 0; $i < $photo; $i++){
        $_FILES['file']['name']       = $_FILES['photo']['name'][$i];
        $_FILES['file']['type']       = $_FILES['photo']['type'][$i];
        $_FILES['file']['tmp_name']   = $_FILES['photo']['tmp_name'][$i];
        $_FILES['file']['error']      = $_FILES['photo']['error'][$i];
        $_FILES['file']['size']       = $_FILES['photo']['size'][$i];

        $uploadPath = './uploads/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
            $imageData = $this->upload->data();
            $uploadImgData[$i]['photo'] = $imageData['file_name'];

        }
    }
    
     if(!empty($uploadImgData)){
        $index = 0; 
        //membuat perulangan berdasarkan kode_nilai sampai data terakhir
        foreach($kode_nilai as $datanilai){ 
        array_push($data, array(
            'kode_nilai'=>$datanilai, //ambil dan set data nilai sesuai index
            'photo'=>$uploadImgData[$index]['photo'],
        ));
        
        $index++;
        }
        // var_dump($data);

        $sql = $this->nilai_model->uploadfile($data);
        redirect('nilai_controller');    
    	}
    
  	}
}
?>




