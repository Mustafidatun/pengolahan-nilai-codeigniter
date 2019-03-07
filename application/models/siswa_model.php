<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Siswa_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function view(){
		return $this->db->get('siswa')->result();
	}
	
	public function view_by($nis){
		$this->db->where('nis', $nis);
    	return $this->db->get('siswa')->row();
	}

	public function save($data){
		$this->db->insert('siswa', $data); 
	}

	public function edit($nis,$data){
		$this->db->where('nis', $nis);
		$this->db->update('siswa', $data);
	}

	public function delete($nis){
		$row = $this->db->where('nis',$nis)->get('siswa')->row();
		unlink('./uploads/'.$row->foto);
		$this->db->where('nis', $nis);
		$this->db->delete('siswa'); 
	}

	// public function listsiswa($keyword) {        
    //     $this->db->order_by('nis', 'DESC');
    //     $this->db->like("nama_siswa", $keyword);
    //     return $this->db->get('siswa')->result_array();
	// }
	
	public function listsiswa(){
		$this->db->order_by('nis', 'ASC');
		$this->db->select('nis, nama_siswa');
        return $this->db->get('siswa')->result();
	}

}

?>