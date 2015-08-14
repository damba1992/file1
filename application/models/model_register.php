<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_register extends CI_Model {

		function __construct(){
			parent::__construct();
		}
	
		public function register($data){
         
         $this->load->database();
			$this->db->insert('user',$data);
			
			return  mysql_insert_id();
			//$this->db-> select('*');
			//$this->db-> insert('user');
			//$this->db-> where('name', $name);
			//$this->db-> where('password', $password);
			//$this->db-> where('email', $email);
			//$this->db-> where('level', $level);
			//$this->db-> where('alamat',$alamat);
			
		//$query = $this->db->get();
		//return $query->result_array();
		}

}


/* End of file m_login.php */
/* Location: ./application/models/m_login.php */
?>
