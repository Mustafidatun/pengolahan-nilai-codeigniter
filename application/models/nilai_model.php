<?php
class Nilai_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getvalidasi($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('user');
		//hanya mengambil 1 data dari database yang telah di where 
		return $query->row();	
	}

	public function getnilai($kode_nilai=''){
		if($kode_nilai==''){
			//query daftar-nilai
			$this->db->select('siswa.nis, 
							siswa.nama_siswa, 
							kelas.tingkat,
							kelas.nama_kelas, 
							mapel.nama_mapel,
				            guru.nama_guru,
							nilai.kode_nilai,
							nilai.tgs1,
							nilai.tgs2,
							nilai.tgs3,
							nilai.uts,
							nilai.uas,
							nilai.na_mapel,
							nilai.foto,
							nilai.grade');
			$this->db->from('nilai');
			$this->db->join('detail_siswa','detail_siswa.kode_detail_siswa = nilai.kode_detail_siswa');
			$this->db->join('siswa','siswa.nis = detail_siswa.nis');
			$this->db->join('detail_guru','detail_guru.kode_detail_guru = nilai.kode_detail_guru');
			$this->db->join('guru','guru.nip = detail_guru.nip');
			$this->db->join('mapel','mapel.kode_mapel = detail_guru.kode_mapel');
			$this->db->join('kelas','kelas.kode_kelas = detail_siswa.kode_kelas', 'kelas.kode_kelas = detail_guru.kode_kelas');
			$this->db->order_by('kelas.tingkat, kelas.nama_kelas, mapel.nama_mapel','ASC');
			$query = $this->db->get();
			//menampilkan semua data dari database
			return $query->result();
		}else{
			//query nilai-edit
			$this->db->select('siswa.nis, 
							siswa.nama_siswa, 
							kelas.tingkat,
							kelas.nama_kelas, 
							mapel.nama_mapel,
				            guru.nama_guru,
							nilai.kode_nilai,
							nilai.tgs1,
							nilai.tgs2,
							nilai.tgs3,
							nilai.uts,
							nilai.uas,
							nilai.na_mapel,
							nilai.grade,
							nilai.foto');
			$this->db->from('nilai');
			$this->db->join('detail_siswa','detail_siswa.kode_detail_siswa = nilai.kode_detail_siswa');
			$this->db->join('siswa','siswa.nis = detail_siswa.nis');
			$this->db->join('detail_guru','detail_guru.kode_detail_guru = nilai.kode_detail_guru');
			$this->db->join('mapel','mapel.kode_mapel = detail_guru.kode_mapel');
			$this->db->join('guru','guru.nip = detail_guru.nip');
			$this->db->join('kelas','kelas.kode_kelas = detail_siswa.kode_kelas', 'kelas.kode_kelas = detail_guru.kode_kelas');
			$this->db->where('kode_nilai',$kode_nilai);
			$query = $this->db->get();
			return $query->row();
		}
	}

	public function simpannilai($kode_nilai, $tgs1, $tgs2, $tgs3, $uts, $uas, $foto){
		// foreach ($data as $dt){
	    //     $kode_nilai = $dt['kode_nilai'];
		// 	$tgs1 = $dt['tgs1'];
		// 	$tgs2 = $dt['tgs2'];
		// 	$tgs3 = $dt['tgs3'];
		// 	$uts = $dt['uts'];
		// 	$uas = $dt['uas'];
		// 	$foto = $dt['foto'];
			$this->db->query("call updateNilai('".$kode_nilai."',
												'".$tgs1."', 
												'".$tgs2."', 
												'".$tgs3."', 
												'".$uts."', 
												'".$uas."',
												'".$foto."'
												)
							");
		// }
	}

	public function pilihmapel(){
		$sql = $this->db->query("SELECT detail_guru.kode_detail_guru,
								       mapel.nama_mapel,
									   kelas.kode_kelas,
								       kelas.tingkat,
									   kelas.nama_kelas,
								       guru.nama_guru
								FROM detail_guru, guru, mapel, kelas 
								WHERE detail_guru.nip = guru.nip AND 
									  detail_guru.kode_mapel = mapel.kode_mapel AND
									  detail_guru.kode_kelas = kelas.kode_kelas AND
									  NOT EXISTS(select * from nilai where nilai.kode_detail_guru = detail_guru.kode_detail_guru)
								ORDER BY kelas.tingkat, kelas.nama_kelas ASC"
			);
		return $sql->result();
	}

	public function tambah($data){
		foreach ($data as $dt){
	        $kode_detail_siswa = $dt['kode_detail_siswa'];
			$kode_detail_guru = $dt['kode_detail_guru'];
			$tgs1 = $dt['tgs1'];
			$tgs2 = $dt['tgs2'];
			$tgs3 = $dt['tgs3'];
			$uts = $dt['uts'];
			$uas = $dt['uas'];
			$this->db->query("call insertNilai('".$kode_detail_siswa."', 
												'".$kode_detail_guru."', 
												'".$tgs1."', 
												'".$tgs2."', 
												'".$tgs3."', 
												'".$uts."', 
												'".$uas."'
												)
							");
		}
		// mengembalikan jumlah baris yang berhasil dimasukkan oleh query insert ke fungsi simpan_quiz
		return $this->db->affected_rows();
	}

	public function tampilnilaiakhir($kode_detail_guru){
		$this->db->select(' siswa.nis, 
							siswa.nama_siswa,
							nilai.kode_nilai,
							nilai.na_mapel,
							nilai.grade ');
		$this->db->from('nilai');
		$this->db->join('detail_siswa','detail_siswa.kode_detail_siswa = nilai.kode_detail_siswa');
		$this->db->join('siswa','siswa.nis = detail_siswa.nis');
		$this->db->where('nilai.kode_detail_guru',$kode_detail_guru);
		$query = $this->db->get();
		return $query->result();

		//seharusnya ada field status pada detail_siswa biar data lama tidak ikut tampil
	}

	public function uploadfile($data){
		foreach ($data as $dt){
	        $kode_nilai = $dt['kode_nilai'];
			$photo = $dt['photo'];
			$this->db->where('kode_nilai',$kode_nilai);
			$this->db->set('foto',$photo);
			$this->db->update('nilai');
		}
	}
}
?>

