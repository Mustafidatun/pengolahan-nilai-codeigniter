<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru_controller extends CI_Controller {
  
  function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
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
			'guru'=> $this->guru_model->view(),
			'message'=>$this->msg,
			'username'=>$this->username
		);
    $this->load->view('guru/guru-daftar', $data);
  }
  
  public function tambah(){
    if($this->input->post('submit')){ 
      $data = array(
        'nip' => $this->input->post('nip'),
        'nama_guru' => $this->input->post('nama_guru'),
        'alamat' => $this->input->post('alamat'),
        'jk' => $this->input->post('jk'),
        'ttl' => $this->input->post('ttl'),
        'pendidikan' => $this->input->post('pendidikan'),
        'no_telp' => $this->input->post('no_telp')
      );
    
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'jpg|jpeg|png|gif';
      $config['max_size']             = 1024;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);
    
      if ( ! $this->upload->do_upload('photo')){
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('guru/guru-input', $error);
      }else{
          $upload_data = $this->upload->data();
          $data['foto'] = $upload_data['file_name'];
          $this->guru_model->save($data);
          redirect('guru_controller');
      }
    }else{
      $this->load->view('guru/guru-input');
    }
  }
  
  public function ubah($nip){
    if($this->input->post('submit')){ 
      $data = array(
        'nip' => $this->input->post('nip'),
        'nama_guru' => $this->input->post('nama_guru'),
        'alamat' => $this->input->post('alamat'),
        'jk' => $this->input->post('jk'),
        'ttl' => $this->input->post('ttl'),
        'pendidikan' => $this->input->post('pendidikan'),
        'no_telp' => $this->input->post('no_telp')
      );
    
      if (!empty($_FILES['photo']['name'])) {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|jpeg|png|gif';
        $config['max_size']             = 1024;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
      
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
      
        if ( ! $this->upload->do_upload('photo')){
          $error = array('error' => $this->upload->display_errors());
          $this->load->view('guru/guru-edit', $error);
        }else{
          $upload_data = $this->upload->data();
          $data['foto'] = $upload_data['file_name'];
          $this->guru_model->edit($data['nip'],$data);
          
          unlink("./uploads/".$this->input->post('oldphoto'));
          redirect('guru_controllerz');
        }
      }else{
        $data['foto'] = $this->input->post('oldphoto');
        $this->guru_model->edit($data['nip'],$data);
        redirect('guru_controller');
      }
    }else{
      $data['guru'] = $this->guru_model->view_by($nip);
      $this->load->view('guru/guru-edit', $data);
    }
  }
  
  public function hapus($nip){
    $this->guru_model->delete($nip); 
    redirect('guru_controller');
  }
}