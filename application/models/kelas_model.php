<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kelas_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function view(){
		$this->db->select('kelas.*, 
							nama_guru');
		$this->db->from('kelas');
		$this->db->join('guru','guru.nip = kelas.walikelas');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function view_by($kode_kelas){
		$this->db->where('kode_kelas', $kode_kelas);
  	return $this->db->get('kelas')->row();
	}

	public function save($data){
		$this->db->insert('kelas', $data); 
	}

	public function edit($kode_kelas,$data){
		$this->db->where('kode_kelas', $kode_kelas);
		$this->db->update('kelas', $data);
	}

	public function delete($kode_kelas){
		$this->db->where('kode_kelas', $kode_kelas);
		$this->db->delete('kelas'); 
	}

	public function listtingkat(){
		$query = $this->db->select('tingkat')->from('kelas')->group_by('tingkat')->get();
		return $query->result();
	} 

	public function listnamakelas($tingkat){
		$query = $this->db->select('kode_kelas, nama_kelas')->from('kelas')->where('tingkat', $tingkat)->get();
		return $query->result();
	} 
}


?>