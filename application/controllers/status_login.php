<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_login extends CI_Controller {

	public  function __construct(){
	parent::__construct();
	$this->load->library('session');
	$this->is_logged_in();
	}
	
	public function is_logged_in(){

				$is_logged_in=$this->session->userdata('is_logged_in');
					if(!isset($is_logged_in)||$is_logged_in!= true) {
					//redirect('c_login');
					} 
		}	
	
	public function index()
	{
		//$x_api_session = $_SERVER["HTTP_X_API_SESSION"];
		//$x_time = $_SERVER["HTTP_X_TIME"];

		//$x_key = md5("api.perpusdesa").$x_time; //7c4baf4191f884fc336ceab47bccf100
	
		//if($x_api_session != null){

			//if($x_api_session === $x_key){

				$nama_user = $this->session->userdata('name');
				$level = $this->session->userdata('level');
				
				
					$message = array('status' => 200, 
								'is_logged_in'=> true,
								'message' => 'login sebagai '.$nama_user.' level '.$level);



				//}else{
				//$message = array('status' => 401, 
								//'message' => 'autentikasi gagal');					
				//}
			//}
		header('Content-type:application/json');
		$response = json_encode($message);
		echo $response;
		}	
		//$data['page']='user/v_dashboard';
        //$this ->load-> view('template',$data);
	
}



/* End of file c_dashboard.php */
/* Location: ./application/controllers/c_dashboard.php */
?>
