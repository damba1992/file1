<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
* 
*/
class C_backup extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('download','file' ));
	}

	function index(){
		redirect('C_backup/backup');
	}

	function backup(){
		$now = date('d-m-y');
		$time = time();
		$this->load->dbutil();
		$config = array(
			'tables' =>array(
				'meja',
				'pesanan',
				'menu',
				'user',
				'detail_pesanan'),
				'format' =>'txt',
				'filename'=>'restoran.sql');
		$backup =& $this->dbutil->backup($config);
		$file_name = 'restoran-'.$now.'.sql';

		force_download($file_name, $backup);
		$message = array('status' => 200, 
                                         'message' => 'download sukses');
		header('Content-type:application/json');
        $response = json_encode($message);
        echo $response;
	}

	
	function restore(){
		$file = $_FILES['file']['name'];
        $file_path = './docs/sql/';
		move_uploaded_file($_FILES['file']['tmp_name'], $file_path.$file);
		$file = $this->load->file($file_path.$file, true);
        $file_array = explode(';', $file);
		foreach($file_array as $query){
		if(!empty(trim($query))){
		$this->db->query("SET FOREIGN_KEY_CHECKS = 0");
        $this->db->query($query);
        $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
        }
        }
        $message = array('status' => 200, 
                         'message' => 'restore database berhasil');
        header('Content-type:application/json');
        $response = json_encode($message);
        echo $response;
        }
}
?>