<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_menu extends CI_Model {


	public function __construct(){
	parent::__construct();
	}
	

	 function menu(){
	 	$this->db->select('*');
	 	$this->db->from('menu');
	 	$query = $this->db->get();
	 	return $query->result_array();
	 }
	
	function post_menu($data){
		$this->load->database();
		$this->db->insert('menu',$data);
		return mysql_insert_id();
	}

	function delete_menu($where){
		$this->db->where('id_menu',$where);
        $this->db->delete('menu');
	}

	function update_menu($id_menu, $dataupdate){
		$this->db->where('id_menu',$id_menu);
		$menu = $this->db->update('menu', $dataupdate);
		return $menu;
	}
	}
?>
	
