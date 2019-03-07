<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_siswa_controller extends CI_Controller {
  
  function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
    $this->load->model('detail_siswa_model');
    $this->load->model('kelas_model');
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
			'detail_siswa'=> $this->detail_siswa_model->view(),
			'message'=>$this->msg,
			'username'=>$this->username
		);
    $this->load->view('detail_siswa/detailsiswa-daftar', $data);
  }
  
  public function tambah(){
    if($this->input->post('submit')){ 
      $data = array(
        'tahun_ajar' => $this->input->post('tahun_ajar'),
        'nis' => $this->input->post('nis'),
        'kode_kelas' => $this->input->post('nama_kelas'),
        'semester' => $this->input->post('semester')
      );
    
        $this->detail_siswa_model->save($data);
        redirect('detail_siswa_controller');
    
    }else{
        $data = array(
          'tingkat' => $this->kelas_model->listtingkat(),
          'siswa' => $this->siswa_model->listsiswa()
        );
        $this->load->view('detail_siswa/detailsiswa-input', $data);
    }
  }
  
  public function ubah($kode_detail_siswa){
    if($this->input->post('submit')){ 
      $data = array(
        'tahun_ajar' => $this->input->post('tahun_ajar'),
        'nis' => $this->input->post('nis'),
        'kode_kelas' => $this->input->post('kode_kelas'),
        'semester' => $this->input->post('semester')
      );
        var_dump($data); //kode_kelas kosong jdi ketika klik button ubah maka akan otomatis mengkapus data : ERROR
        $this->detail_siswa_model->edit($kode_detail_siswa,$data);
        redirect('detail_siswa_controller');
    }else{
        $data = array(
          'detail_siswa' => $this->detail_siswa_model->view_by($kode_detail_siswa),
          'tingkat' => $this->kelas_model->listtingkat(),
          'siswa' => $this->siswa_model->listsiswa()
        );
        $this->load->view('detail_siswa/detailsiswa-edit', $data);
    }
  }
  
  public function hapus($kode_detail_siswa){
    $this->detail_siswa_model->delete($kode_detail_siswa); 
    redirect('detail_siswa_controller');
  }

}