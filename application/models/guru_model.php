<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Guru_model extends CI_Model {

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

  public function view(){
    return $this->db->get('guru')->result();
  }
  
  public function view_by($nip){
    $this->db->where('nip', $nip);
    return $this->db->get('guru')->row();
  }
  
  public function save($data){
    $this->db->insert('guru', $data); 
  }
 
  public function edit($nip,$data){
    $this->db->where('nip', $nip);
    $this->db->update('guru', $data);
  }
  
  public function delete($nip){
    $row = $this->db->where('nip',$nip)->get('guru')->row();
    unlink('./uploads/'.$row->foto);
    $this->db->where('nip', $nip);
    $this->db->delete('guru'); 
  }

  public function listguru(){
    $this->db->select('nip, 
							        nama_guru');
    $this->db->from('guru');
    $this->db->order_by('nip', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }
}
