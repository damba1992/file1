<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tabel extends CI_Model {


	public function __construct(){
	parent::__construct();
	}
	

	 function data_tabel(){
	 	//$this->db->select('*');
	 	//$this->db->from('pesanan');
	 	$this->db->select('a.nama_menu, a.stok, c.jumlah, c.no_meja, c.no_transaksi,c.total, c.id_pesanan');
	 	$this->db->from ('menu a, pesanan c') ;
	 	$this->db->where ('a.nama_menu = c.nama_menu');
	 	$this->db->order_by ('id_pesanan','desc');
	 	$query = $this->db->get();
	 	return $query->result_array();
	 }
	 //MODEL
	 function post_($data){
		$this->load->database();
		$this->db->insert('pesanan',$data);
		return mysql_insert_id();
	}

	 function put_tabel($id_pesanan, $data){
	 	$this->db->where('id_pesanan',$id_pesanan);
	 	$put =$this->db->update('pesanan',$data);
	 	return $put;
	}

	 function delete_tabel($where){
	 	$this->db->where('id_pesanan',$where);
	 	$this->db->delete('pesanan');
	 	
	 }

	 function caripesanan(){
	 	$no_transaksi = $this->input->post('no_transaksi');
		$meja = $this->input->post('no_meja');
		$this->db->like('no_meja', $meja);
		$this->db->like('no_transaksi',$no_transaksi);
		
		$this->db->select('a.no_transaksi, a.date, a.no_meja,a.total, b.nama_menu ');
	 	$this->db->from('pesanan a,menu b');
	 	$this->db->where ('a.nama_menu = b.nama_menu');
		$query= $this->db->get();
		return $query->result_array();
	 }

	 function totalpesan(){
	 	
	 	$no_transaksi = $this->input->post('no_transaksi');
		$meja = $this->input->post('no_meja');

	 	$this->db->select("sum(total)");
	 	$this->db->from('pesanan');
	 	$this->db->group_by('no_transaksi');
	 	$this->db->where('no_transaksi', $no_transaksi);
		$query= $this->db->get();
	 	return $query->result_array();
	 }

	 function laporan(){
	 	$this->db->select('c.date,a.nama_menu, c.no_meja, c.no_transaksi, c.total, c.id_pesanan');
	 	$this->db->from ('menu a, pesanan c') ;
	 	$this->db->where ('a.nama_menu = c.nama_menu ');
	 	$this->db->order_by ("id_pesanan","desc");
		$query= $this->db->get();

	 	return $query->result_array();
	 }

	 function totallaporan(){
	 	$this->db->select("sum(total)");
	 	$this->db->from('pesanan');
		$query= $this->db->get();
	 	return $query->result_array();
	 	//$query=$this->db->query("select * sum(total) from pesan");
	 }


	
	}
	
	

	?>
