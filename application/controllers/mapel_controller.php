<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapel_controller extends CI_Controller {
  
  function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
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
			'mapel'=> $this->mapel_model->view(),
			'message'=>$this->msg,
			'username'=>$this->username
		);
    $this->load->view('mapel/mapel-daftar', $data);
  }
  
  public function tambah(){
    if($this->input->post('submit')){ 
      $data = array(
        'nama_mapel' => $this->input->post('nama_mapel'),
        'kkm' => $this->input->post('kkm')
      );
    
        $this->mapel_model->save($data);
        redirect('mapel_controller');
    
    }else{
        $this->load->view('mapel/mapel-input');
    }
  }
  
  public function ubah($kode_mapel){
    if($this->input->post('submit')){ 
      $data = array(
        'nama_mapel' => $this->input->post('nama_mapel'),
        'kkm' => $this->input->post('kkm')
      );

        $this->mapel_model->edit($kode_mapel,$data);
        redirect('mapel_controller');
    }else{
        $data['mapel'] = $this->mapel_model->view_by($kode_mapel);
        $this->load->view('mapel/mapel-edit', $data);
    }
  }
  
  public function hapus($kode_mapel){
    $this->mapel_model->delete($kode_mapel); 
    redirect('mapel_controller');
  }
}