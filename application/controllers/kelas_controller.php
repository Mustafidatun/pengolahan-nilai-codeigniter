<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas_controller extends CI_Controller {
  
  function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->model('kelas_model');
        $this->load->model('guru_model');
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
			'kelas'=> $this->kelas_model->view(),
			'message'=>$this->msg,
			'username'=>$this->username
		);
    $this->load->view('kelas/kelas-daftar', $data);
  }
  
  public function tambah(){
    if($this->input->post('submit')){ 
      $data = array(
        'tingkat' => $this->input->post('tingkat'),
        'nama_kelas' => $this->input->post('nama_kelas'),
        'walikelas' => $this->input->post('walikelas')
      );
    
        $this->kelas_model->save($data);
        redirect('kelas_controller');
    
    }else{
        $data['guru'] = $this->guru_model->listguru();
        $this->load->view('kelas/kelas-input', $data);
    }
  }
  
  public function ubah($kode_kelas){
    if($this->input->post('submit')){ 
      $data = array(
        'tingkat' => $this->input->post('tingkat'),
        'nama_kelas' => $this->input->post('nama_kelas'),
        'walikelas' => $this->input->post('walikelas')
      );

        $this->kelas_model->edit($kode_kelas,$data);
        redirect('kelas_controller');
    }else{
        $data = array(
            'guru' => $this->guru_model->listguru(),
            'kelas' => $this->kelas_model->view_by($kode_kelas)
        );
        $this->load->view('kelas/kelas-edit', $data);
    }
  }
  
  public function hapus($kode_kelas){
    $this->kelas_model->delete($kode_kelas); 
    redirect('kelas_controller');
  }

  public function listnamakelas(){
    $tingkat = $this->input->post('tingkat');
    $nama_kelas = $this->kelas_model->listnamakelas($tingkat);
    $lists = "<option value=''>Pilih</option>";
    
    foreach($nama_kelas as $data){
      $lists .= "<option value='".$data->kode_kelas."'>".$data->nama_kelas."</option>";
      
    }
    
    $callback = array('list_nama_kelas'=>$lists); 
    echo json_encode($callback); 


  }
}