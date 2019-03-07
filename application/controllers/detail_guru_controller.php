<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_guru_controller extends CI_Controller {
  
  function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->model('detail_guru_model');
        $this->load->model('kelas_model');
        $this->load->model('guru_model');
        $this->load->model('mapel_model');
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
			'detail_guru'=> $this->detail_guru_model->view(),
			'message'=>$this->msg,
			'username'=>$this->username
		);
    $this->load->view('detail_guru/detailguru-daftar', $data);
  }
  
  public function tambah(){
    if($this->input->post('submit')){ 
      $data = array(
        'nip' => $this->input->post('nip'),
        'kode_kelas' => $this->input->post('nama_kelas'),
        'kode_mapel' => $this->input->post('kode_mapel')
      );
    
        $this->detail_guru_model->save($data);
        redirect('detail_guru_controller');
    
    }else{
        $data = array(
          'tingkat' => $this->kelas_model->listtingkat(),
          'guru' => $this->guru_model->listguru(),
          'mapel' => $this->mapel_model->listmapel()
        );
        $this->load->view('detail_guru/detailguru-input', $data);
    }
  }
  
  public function ubah($kode_detail_guru){
    if($this->input->post('submit')){ 
      $data = array(
        'nip' => $this->input->post('nip'),
        'kode_kelas' => $this->input->post('kode_kelas'),
        'kode_mapel' => $this->input->post('kode_mapel')
      );
        var_dump($data); //kasusnya sma seperti detail_siswa
        $this->detail_guru_model->edit($kode_detail_guru,$data);
        redirect('detail_guru_controller');
    }else{
        $data = array(
          'detail_guru' => $this->detail_guru_model->view_by($kode_detail_guru),
          'tingkat' => $this->kelas_model->listtingkat(),
          'guru' => $this->guru_model->listguru(),
          'mapel' => $this->mapel_model->listmapel()
        );
        $this->load->view('detail_guru/detailguru-edit', $data);
    }
  }
  
  public function hapus($kode_detail_guru){
    $this->detail_guru_model->delete($kode_detail_guru); 
    redirect('detail_guru_controller');
  }

}