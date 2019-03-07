<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Detail_guru_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function view(){
		$this->db->select('detail_guru.kode_detail_guru, 
                            guru.nip,
                            guru.nama_guru,
                            mapel.nama_mapel,
                            kelas.tingkat,
                            kelas.nama_kelas
                            ');
		$this->db->from('detail_guru');
        $this->db->join('guru','guru.nip = detail_guru.nip');
        $this->db->join('mapel','mapel.kode_mapel = detail_guru.kode_mapel');
        $this->db->join('kelas','kelas.kode_kelas = detail_guru.kode_kelas');
        $this->db->order_by('kelas.tingkat, kelas.nama_kelas','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function view_by($kode_detail_guru){
		$this->db->where('kode_detail_guru', $kode_detail_guru);
		$query = $this->db->get('detail_guru');
  		return $query->row();
	}

	public function save($data){
		$this->db->insert('detail_guru', $data); 
	}

	public function edit($kode_detail_guru,$data){
		$this->db->where('kode_detail_guru', $kode_detail_guru);
		$this->db->update('detail_guru', $data);
	}

	public function delete($kode_detail_guru){
		$this->db->where('kode_detail_guru', $kode_detail_guru);
		$this->db->delete('detail_guru'); 
	}

	public function dtdetailguru($kode_detail_guru){
		$this->db->select('detail_guru.kode_detail_guru, 
                            guru.nama_guru,
                            mapel.nama_mapel,
                            kelas.tingkat,
                            kelas.nama_kelas
                            ');
		$this->db->from('detail_guru');
        $this->db->join('guru','guru.nip = detail_guru.nip');
        $this->db->join('mapel','mapel.kode_mapel = detail_guru.kode_mapel');
        $this->db->join('kelas','kelas.kode_kelas = detail_guru.kode_kelas');
		$query = $this->db->get();
		return $query->row();
	}
}


?>