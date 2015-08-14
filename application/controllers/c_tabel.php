<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class C_tabel extends CI_Controller{
    function __construct(){   
        parent::__construct(); 
        $this->load->model('m_tabel');
        $this->load->library('excel_generator');
    }
    function index(){   
       // $x_api_session = $_SERVER["HTTP_X_API_SESSION"];
        //$x_time = $_SERVER["HTTP_X_TIME"];

        //$x_key = md5("api.perpusdesa").$x_time; //7c4baf4191f884fc336ceab47bccf100
    
        //if($x_api_session != null){

          //if($x_api_session === $x_key){

                
     	$data['pesanan']= $this->m_tabel->data_tabel();                        
       $message = $data;
        


                //$data = array();
                //$data['perpus']  = $this->m_web->data_perpus('perpus');
                //$data['page']='home/v_home';
                //$this ->load-> view('template',$data); 

                //$message = $data;
           
            //}else{
              // $message = array('status' => 401, 
                              //  'message' => 'autentikasi gagal');                  
                //}
            //}
        header("Content-type:application/json");
        $response = json_encode($message);
        echo $response;
        }


    function post(){ 
        $this->form_validation->set_rules('jumlah','jumlah','required');
        $this->form_validation->set_rules('no_transaksi','no_transaksi','required');
        $this->form_validation->set_rules('date','date','required');
        $this->form_validation->set_rules('no_meja','no_meja','required');
        //$this->form_validation->set_rules('no_meja','no_meja','required');
       
        if($this->form_validation->run()==FALSE){
                $message = array('status'=> 401,'message'=>'data tidak lengkap');
            }else{
                //total
            $nama_menu =$this->input->post('nama_menu');
            $jumlah = $this->input->post('jumlah');
            //$ckeproduk = $this->db->get_where('menu',array('nama_menu'=>$nama_menu))->result();
            $ckeproduk = $this->db->get_where('menu',array('nama_menu'=>$nama_menu))->row_array();
            $harga = $ckeproduk['harga'];
            $total =$this->input->post('jumlah') * $harga;
            //stok
            // $newstock = $ckeproduk[0]->stok - $jumlah;
            // $where= array('nama_menu'=> $nama_menu); //kalo parameternya mau pake nama_menu, tapi sebaiknya pake id yang unik gan
            // $data2  = array('stok'=> $newstok); 
            // $this->db->update('menu',$where,$data2);
            //stok2
            $newstok = $ckeproduk->stok - $jumlah;
            $where= array('nama_menu'=> $nama_menu); //kalo parameternya mau pake nama_menu, tapi sebaiknya pake id yang unik gan
            $data2  = array('stok'=> $newstok); 
            $this->db->update('menu',$where,$data2);
        
         $data= array(

            'nama_menu' =>$nama_menu,
            'jumlah' =>$jumlah,
            'no_transaksi'=>$this->input->post('no_transaksi'),
            'date' =>$this->input->post('date'),
            'no_meja' =>$this->input->post('no_meja'),
            'total' =>$total,
            );
        $query = $this->m_tabel->post_($data);
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

    function put($id_pesanan){
        $this->form_validation->set_rules('jumlah','jumlah','required');
        $this->form_validation->set_rules('no_transaksi','no_transaksi','required');
        $this->form_validation->set_rules('date','date','required');
        $this->form_validation->set_rules('no_meja','no_meja','required');
        //$this->form_validation->set_rules('no_meja','no_meja','required');
       
        if($this->form_validation->run()==FALSE){
                $message = array('status'=> 401,'message'=>'data tidak lengkap');
            }else{
            $hasil = $this->input->post('jumlah');
            $harga = $this->input->post('harga');
            $total = $hasil * $harga;

         $data= array (

            'id_menu' =>$this->input->post('id_menu'),
            'jumlah' =>$this->input->post('jumlah'),
            'no_transaksi'=>$this->input->post('no_transaksi'),
            'date' =>$this->input->post('date'),
            'no_meja' =>$this->input->post('no_meja'),
            'total' =>$total,

            );
        $query = $this->m_tabel->put_tabel($id_pesanan,$data);
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

    function delete($id_pesanan){
        $where = $id_pesanan;
        $query = $this->m_tabel->delete_tabel($where);
        $message = array('status' => 200 ,'message'=>'data berhasil dihapus' );
        
        header("Content-type:application/json");
        $response = json_encode($message);
        echo $response;
    }

    function caripesanan(){
        $this->form_validation->set_rules('no_transaksi','no_transaksi','required');
        //$this->form_validation->set_rules('bayar','bayar','required');
       
        if($this->form_validation->run()==FALSE){
        $message = array('status'=> 401,'message'=>'data tidak lengkap');
        }else{
        $query['data'] = $this->m_tabel->caripesanan();
        $bayar['bayar'] = $this->m_tabel->totalpesan();
        $message = array('status'=> 200,'message'=>'pencarian berhasil',
                                'data'=>$query,
                                'bayar'=>$bayar);
        };
        header("content-type:application/json");
        $response = json_encode($message);
        echo $response;

}

    function laporan(){
        $query['data'] = $this->m_tabel->laporan();
        $total['total'] = $this->m_tabel->totallaporan();
        $message = array('status'=> 200,'message'=>'sukses',
                                'data'=>$query,
                                'total'=>$total);
           
        header("content-type:application/json");
        $response = json_encode($message);
        echo $response;
    }

    function count(){
        $this->form_validation->set_rules('total','total','required');
        $this->form_validation->set_rules('bayar','bayar','required');
       
        if($this->form_validation->run()==FALSE){
        $message = array('status'=> 401,'message'=>'data tidak lengkap');
        }else{
        $total = $this->input->post('total');
        $bayar = $this->input->post('bayar');
        $kembalian ['data']= $bayar - $total;
        $message = array ('status'=>200, 'message'=>'sukses',
                           'data'=>$kembalian);
        };
        header("content-type:application/json");
        $response = json_encode($message);
        echo $response;
    }
    function excel(){
        $query = $this->db->get('pesanan');
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('id_pesanan','no_transaksi', 'id_menu', 'date','total','jumlah','no_meja'));
        $this->excel_generator->set_column(array('id_pesanan','no_transaksi', 'id_menu', 'date','total','jumlah','no_meja'));
        $this->excel_generator->set_width(array(25, 15, 30, 15));
        $this->excel_generator->exportTo2007('pesanan');
    }

    

 }

 ?>