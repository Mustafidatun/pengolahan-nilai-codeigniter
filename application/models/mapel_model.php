<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mapel_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function view(){
		return $this->db->get('mapel')->result();
	}
	
	public function view_by($kode_mapel){
		$this->db->where('kode_mapel', $kode_mapel);
    	return $this->db->get('mapel')->row();
	}

	public function save($data){
		$this->db->insert('mapel', $data); 
	}

	public function edit($kode_mapel,$data){
		$this->db->where('kode_mapel', $kode_mapel);
		$this->db->update('mapel', $data);
	}

	public function delete($kode_mapel){
		$this->db->where('kode_mapel', $kode_mapel);
		$this->db->delete('mapel'); 
	}

	public function listmapel(){
		$this->db->order_by('nama_mapel', 'ASC');
		$this->db->select('kode_mapel, nama_mapel');
        return $this->db->get('mapel')->result();
	}
}


?>