<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('model_user');
		}

	
	public function index(){
		$this->load->view('v_login');
	}

	function login(){

		$this->form_validation->set_rules('name','name','required');
		$this->form_validation->set_rules('password','Password','required');
				
		if($this->form_validation->run()==FALSE){
		}else{
		$name = $this->input->post('name');
		$password = md5($this->input->post('password'));
		$level = $this->input->post('level');
				
		$hasil = $this->model_user->validasi($name,$password,$level);
		if($hasil == TRUE)
					{
		foreach($hasil as $data_login)
					{
		$name=$data_login['name'];
		$password=$data_login['password'];
		$level = $data_login ['level'];
		}
		$data_login=array(
		'name'=>$name,
		'level'=>$level
		);
		$this->session->set_userdata($data_login);
		$messag = array('status' => 200, 
						'message' => 'login sukses');
		}else  {
		$messag = array('status' => 402, 
						'message' => 'username atau password salah');
		}
		}
		header("Content-type:application/json");
		$response = json_encode($messag);
		echo $response;
		}
		//logout get()
		public function logout(){
		//$x_api_session = $_SERVER["HTTP_X_API_SESSION"];
		//$x_time = $_SERVER["HTTP_X_TIME"];

		//$x_key = md5("api.perpusdesa").$x_time; //7c4baf4191f884fc336ceab47bccf100
	
		//if($x_api_session != null){

			//if($x_api_session === $x_key){


				$this->session->sess_destroy();
				$message = array('status' => 200, 
									 'message' => 'logout sukses');
				//redirect(base_url());

			//}else{
				//$message = array('status' => 401, 
								//'message' => 'autentikasi gagal');				
			//}
		
		//}
		header("Content-type:application/json");
		$response = json_encode($message);
		echo $response;

	}


}

/* End of file c_login.php */
/* Location: ./application/controllers/c_login.php */
?>
