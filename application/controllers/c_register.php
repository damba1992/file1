<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_register extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('model_register');
			}

	public function register()
	{
		//$x_api_session = $_SERVER["HTTP_X_API_SESSION"];
		//$x_time = $_SERVER["HTTP_X_TIME"];

		//$x_key = md5("api.perpusdesa").$x_time; //7c4baf4191f884fc336ceab47bccf100
	
		//if($x_api_session != null){

			//if($x_api_session === $x_key){


				$this->form_validation->set_rules('name','name','required');
				$this->form_validation->set_rules('password','Password','required');
				$this->form_validation->set_rules('email','email','required');
				$this->form_validation->set_rules('level','level','required');
				$this->form_validation->set_rules('alamat','alamat','required');

			if($this->form_validation->run()==FALSE){
				$message = array('status'=> 401,'message'=>'data tidak lengkap');
			}else{
            			$data=array(
                			'name' => $this->input->post('name'),
                			'email' => $this->input->post('email'),
                			'level' => $this->input->post('level'),
                			'alamat' => $this->input->post('alamat'),                                
                			'password' => md5($this->input->post('password'))
                );

            $query = $this->model_register->register($data);
            if($query==TRUE){
                $message = array('status'=> 200,'message'=>'registrasi berhasil');
            }else{
                $message = array('status'=> 402,'message'=>'registrasi gagal');
            }
        }  
		            
				
				
		header("Content-type:application/json");
		$response = json_encode($message);
		echo $response;

	
		
}

}
/* End of file c_login.php */
/* Location: ./application/controllers/c_login.php */
?>
