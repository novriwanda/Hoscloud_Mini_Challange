<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Home_m extends CI_Model{

    function get_data_order()
    {
      $this->db->join('tbl_user', 'tbl_detail_order.id_user = tbl_user.id_user');
      $this->db->join('tbl_order','tbl_detail_order.id_order = tbl_order.id_order');
      $this->db->join('tbl_produk','tbl_detail_order.id_produk = tbl_produk.id_produk') ;
      return $this->db->get('tbl_detail_order');
    }

    function hitung_data($table,$data)
    {
      $this->db->select($data);
      return $this->db->get($table);
    }

  	function input_data($data,$table){
  		$this->db->insert($table,$data) ;
  	}

  	function cek_data($where,$table)
  	{
  		return $this->db->get_where($table,$where) ;
  	}

  	function get_data($table)
    {
    	$this->db->where('is_active = 1') ;
      return $this->db->get($table);
    }

    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function hapus_data($where,$table){
      $this->db->where($where);
      $this->db->delete($table);
    }

    public function upload(){
        $config['upload_path'] = 'assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['width']= 400;
        $config['height']= 400;
        $config['remove_space'] = TRUE;
      
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
          // Jika berhasil :
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          // Jika gagal :
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
    }

  }
  ?>