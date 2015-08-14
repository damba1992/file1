<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class C_meja extends CI_Controller{
    function __construct(){   
        parent::__construct(); 
        $this->load->model('m_meja');
    }


    function index(){   
        //$x_api_session = $_SERVER["HTTP_X_API_SESSION"];
        //$x_time = $_SERVER["HTTP_X_TIME"];

        //$x_key = md5("api.perpusdesa").$x_time; //7c4baf4191f884fc336ceab47bccf100
    
        //if($x_api_session != null){

          //  if($x_api_session === $x_key){

                
     	$data['meja']= $this->m_meja->data_meja();                        

                $message = $data;
           
           // }else{
                // $message = array('status' => 401, 
                //                 'message' => 'autentikasi gagal');                  
             //   }
            //}
        header("Content-type:application/json");
        $response = json_encode($message);
        echo $response;
        }

    function post_meja(){
        $this->form_validation->set_rules('no_meja','no_meja','required');
               
        if($this->form_validation->run()==FALSE){
            $message = array('status'=> 401,'message'=>'data tidak lengkap');
        }else{
            $data= array (
            'no_meja' =>$this->input->post('no_meja'),
            );
        $query = $this->m_meja->post_meja($data);
            if($query==TRUE){
                $message = array('status'=> 200,'message'=>'data berhasil di inputkan');
            }else{
                $message = array('status'=> 402,'message'=>'data gagal di inputkan');
            }
        }
        header("Content-type:application/json");
        $response = json_encode($message);
        echo $response;

    }

    function put($id){
        $this->form_validation->set_rules('no_meja','no_meja','required');
               
        if($this->form_validation->run()==FALSE){
            $message = array('status'=> 401,'message'=>'data tidak lengkap');
        }else{
            $data= array (
            'no_meja' =>$this->input->post('no_meja'),
            );
        $query = $this->m_meja->put_meja($id,$data);
            if($query==TRUE){
                $message = array('status'=> 200,'message'=>'data berhasil di inputkan');
            }else{
                $message = array('status'=> 402,'message'=>'data gagal di inputkan');
            }
        }
        header("Content-type:application/json");
        $response = json_encode($message);
        echo $response;
    }

    function delete_meja($id_meja){
        $where = $id_meja;
        $query = $this->m_meja->delete_meja($where);
        $message = array('status' => 200 ,'message'=>'data berhasil dihapus' );
        
        header("Content-type:application/json");
        $response = json_encode($message);
        echo $response;
    }
}
?>