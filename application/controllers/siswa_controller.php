<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('siswa_model');
		$this->load->library('upload');
		$this->msg = $this->session->flashdata('message');
		$this->username = $this->session->userdata('username');	

		if (empty($this->username)){
			$this->session->set_flashdata('message','Login dulu');
			redirect('login');			
		}
	}
	
	public function index(){
		$data= array(
			'siswa'=> $this->siswa_model->view(),
			'message'=>$this->msg,
			'username'=>$this->username
		);
		$this->load->view('siswa/siswa-daftar',$data);
	}

	public function tambah(){
		if($this->input->post('submit')){ 
			$data = array(
				'nis' => $this->input->post('nis'),
				'nama_siswa' => $this->input->post('nama_siswa'),
				'alamat' => $this->input->post('alamat'),
				'jk' => $this->input->post('jk'),
				'ttl' => $this->input->post('ttl'),
				'agama' => $this->input->post('agama')
			);

			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'jpg|jpeg|png|gif';
			$config['max_size']             = 1024;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				
			if (! $this->upload->do_upload('photo')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('siswa/siswa-input', $error);
			}else{
				$imageData = $this->upload->data();
				$data['foto'] = $imageData['file_name'];
				$result=$this->siswa_model->save($data);
				redirect("siswa_controller");
			}
		}else{
			$this->load->view('siswa/siswa-input');
		}
	}

	public function ubah($nis){
		if($this->input->post('submit')){
			$data = array(
				'nis'=>$this->input->post('nis'),
				'nama_siswa'=>$this->input->post('nama_siswa'),
				'alamat'=>$this->input->post('alamat'),
				'jk'=>$this->input->post('jk'),
				'ttl'=>$this->input->post('ttl'),
				'agama'=>$this->input->post('agama')
			);

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
					$this->load->view('siswa/siswa-edit', $error);
				}else{
					$upload_data = $this->upload->data();
					$data['foto'] = $upload_data['file_name'];
					$this->siswa_model->edit($data['nis'],$data);
					
					unlink("./uploads/".$this->input->post('oldphoto'));
					redirect('siswa_controller');
				}
			}else{
				$data['foto'] = $this->input->post('oldphoto');
				$this->siswa_model->edit($data['nis'],$data);
				redirect('siswa_controller');
			}
		}else{
			$data['siswa'] = $this->siswa_model->view_by($nis);
			$this->load->view('siswa/siswa-edit', $data);
		}
	}

	public function hapus($nis){
		$this->siswa_model->delete($nis);
		redirect('siswa_controller');
	}

	public function listsiswa(){
        $keyword=$this->input->post('keyword');
        $data=$this->siswa_model->listsiswa($keyword);        
        echo json_encode($data);
    }
}
