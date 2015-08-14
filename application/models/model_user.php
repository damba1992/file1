<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model {

		function __construct(){
			parent::__construct();
		}
	
		public function validasi($name, $password){
         
			$this->db-> select('*');
			$this->db-> from('user');
			$this->db-> where('name', $name);
			$this->db-> where('password', $password);
			
		$query = $this->db->get();
		return $query->result_array();
		}

}


/* End of file m_login.php */
/* Location: ./application/models/m_login.php */
?>
