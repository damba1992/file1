<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class C_menu extends CI_Controller{
    function __construct(){   
        parent::__construct(); 
        $this->load->model('m_menu');
    }

    function index(){           
     	$data['menu']= $this->m_menu->menu();                        
        $message = $data;
    
        header("Content-type:application/json");
        $response = json_encode($message);
        echo $response;
        }

    function post_menu(){
        $this->form_validation->set_rules('nama_menu','nama_menu','required');
        $this->form_validation->set_rules('harga','harga','required');
        $this->form_validation->set_rules('stok','stok','required');
        
        
        if($this->form_validation->run()==FALSE){
            $message = array('status'=> 401,'message'=>'data tidak lengkap');
        }else{
            $data= array (
            'nama_menu' =>$this->input->post('nama_menu'),
            'harga' =>$this->input->post('harga'),
            'stok' =>$this->input->post('stok'),
            );
        $query = $this->m_menu->post_menu($data);
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

    function put($id_menu){
        $this->form_validation->set_rules('nama_menu','nama_menu','required');
        $this->form_validation->set_rules('harga','harga','required');
        $this->form_validation->set_rules('stok','stok','required');
        
        
        if($this->form_validation->run()==FALSE){
            $message = array('status'=> 401,'message'=>'data tidak lengkap');
        }else{
            $dataupdate= array (
            'nama_menu' =>$this->input->post('nama_menu'),
            'harga' =>$this->input->post('harga'),
            'stok' =>$this->input->post('stok'),
            );
        $query = $this->m_menu->update_menu($id_menu, $dataupdate);
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

    function delete_menu($id_menu){
        $where = $id_menu;
        $query = $this->m_menu->delete_menu($where);
        $message = array('status' => 200 ,'message'=>'data berhasil dihapus' );
        
        header("Content-type:application/json");
        $response = json_encode($message);
        echo $response;
    }
}
?>