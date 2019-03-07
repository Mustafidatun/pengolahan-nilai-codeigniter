<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('nilai_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index(){
		//variable session
		$username = $this->session->userdata('username');
		//session yang hanya berdifat sementara
		$data['message'] = $this->session->flashdata('message');
		
		if (empty($username)){					
			$this->load->view('login/index',$data);			
		} else {
			redirect('siswa_controller');
		}			
	}
	
	
	public function validasi(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$row = $this->nilai_model->getvalidasi($username,$password);
		if ($row->username == $username && $row->password = $password){						
			$this->session->set_userdata('username',$row->username);			
			redirect('siswa_controller');
		} else {
			$this->session->set_flashdata('message','Data tidak benar');
			redirect('login');
		}		
	}
	
	public function logout(){
		$this->session->unset_userdata('username');		
		redirect('login');
	}
}