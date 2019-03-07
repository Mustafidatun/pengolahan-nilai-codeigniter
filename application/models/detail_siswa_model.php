<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Detail_siswa_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function view(){
		$this->db->select('detail_siswa.kode_detail_siswa, 
                            detail_siswa.tahun_ajar,
                            detail_siswa.nis,
                            detail_siswa.semester,
                            siswa.nama_siswa,
                            kelas.tingkat,
                            kelas.nama_kelas
                            ');
		$this->db->from('detail_siswa');
        $this->db->join('siswa','siswa.nis = detail_siswa.nis');
        $this->db->join('kelas','kelas.kode_kelas = detail_siswa.kode_kelas');
        $this->db->order_by('detail_siswa.tahun_ajar, detail_siswa.semester','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function view_by($kode_detail_siswa){
		$this->db->where('kode_detail_siswa', $kode_detail_siswa);
		$this->db->join('kelas','kelas.kode_kelas = detail_siswa.kode_kelas');
		$this->db->from('detail_siswa');
		$this->db->select('detail_siswa.*,
							kelas.tingkat');
		$query = $this->db->get();
  		return $query->row();
	}

	public function save($data){
		$this->db->insert('detail_siswa', $data); 
	}

	public function edit($kode_detail_siswa,$data){
		$this->db->where('kode_detail_siswa', $kode_detail_siswa);
		$this->db->update('detail_siswa', $data);
	}

	public function delete($kode_detail_siswa){
		$this->db->where('kode_detail_siswa', $kode_detail_siswa);
		$this->db->delete('detail_siswa'); 
	}

	public function listdetailsiswa($kode_kelas){
		$this->db->select(' detail_siswa.kode_detail_siswa,
							detail_siswa.nis, 
							siswa.nama_siswa ');
		$this->db->from('detail_siswa');
		$this->db->join('siswa', 'siswa.nis = detail_siswa.nis');
		$this->db->where('kode_kelas',$kode_kelas);
		$this->db->order_by('detail_siswa.tahun_ajar, detail_siswa.semester','DESC');
		$query = $this->db->get();
		return $query->result();

		//seharusnya terdapat field status pada detail_siswa untuk memfilter tahun ajar dan semester
	}
}


?>