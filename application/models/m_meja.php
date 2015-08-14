<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_meja extends CI_Model {


	public function __construct(){
	parent::__construct();
	}
	

	 function data_meja(){
	 	$this->db->select('*');
	 	$this->db->from('meja');
	 	$query = $this->db->get();
	 	return $query->result_array();
	 }
	
	function post_meja($data){
		$this->load->database();
		$this->db->insert('meja',$data);
		return mysql_insert_id();
	}

	function delete_meja($where){
		$this->db->where('id',$where);
        $this->db->delete('meja');
	}

	function put_meja($id,$data){
		$this->db->where('id',$id);
		$meja = $this->db->update('meja',$data);
		return $meja;
	}
	}

	
