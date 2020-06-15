<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('keranjang_model');
		$this->load->model('Home_m');
		$this->load->library('session');

		if ($this->session->userdata('role') != "admin") {
			redirect(base_url("Page"));
		}
	}

	public function index()
	{
		$data = array(
			'produk' => $this->keranjang_model->get_produk_all(),
			'kategori' => $this->keranjang_model->get_kategori_all(),
			'data_order' => $this->Home_m->get_data_order()->result(),
		);
		$this->load->view('__admin/home_view.php',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('Page'));
	}

	public function tambah_kategori()
	{
		$nama_kategori = $this->input->post('kategori');
		$this->session->userdata('id_user') ;
		$data = array(
			'nama_kategori' => $nama_kategori,
			'created_at ' => $this->session->userdata('id_user'),
		);
		$this->Home_m->input_data($data,'tbl_kategori');

		echo $this->session->set_flashdata('pesan', ' 
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    data berhasil ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');

		redirect(base_url("Admin?page=kategori"));
	}

	public function edit_kategori()
	{
		$id = $this->input->post('id');
		$nama_kategori = $this->input->post('kategori');

		$where = array(
			'id' => $id,
		);

    	$data = array(
        	'id' => $id,
        	'nama_kategori' => $nama_kategori,
        	'modified_by' => $this->session->userdata('id_user'),
        	'modified_date' => date("Y-m-d H:i:s"),
        );

       $this->Home_m->update_data($where,$data,'tbl_kategori');

		echo $this->session->set_flashdata('pesan', ' 
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    data berhasil diubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');

		redirect(base_url("Admin?page=kategori"));
	}

	public function hapus_kategori()
	{
		$id = $this->input->post('id');

		$where = array(
			'id' => $id,
		);

       $this->Home_m->hapus_data($where,'tbl_kategori');

		echo $this->session->set_flashdata('pesan', ' 
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    data berhasil dihapus
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');

		redirect(base_url("Admin?page=kategori"));
	}

	public function tambah_produk()
	{
		$data = array();
		$upload = $this->Home_m->upload();

		if($upload['result'] == "success"){

			$data = array(
				'nama_produk' => $this->input->post('nama_produk'),
				'deskripsi'=> $this->input->post('input_deskripsi'),
				'gambar' => $upload['file']['file_name'],
				'harga' => $this->input->post('harga'),
				'kategori' => $this->input->post('kategori'),
				'created_at' => $this->session->userdata('id_user')
			);
		
			$this->Home_m->input_data($data,'tbl_produk');

			echo $this->session->set_flashdata('pesan', ' 
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    data berhasil diupload
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');

			redirect(base_url("Admin?page=produk"));
		}
		else{
			echo $data['message'] = $upload['error'];
			echo $this->session->set_flashdata('pesan', ' 
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> 
                    '.$data['message'].'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
			redirect(base_url("Admin?page=produk"));
		}
	}

	public function edit_produk()
	{
		$data = array(
			'nama_produk' => $this->input->post('nama_produk'),
			'deskripsi'=> $this->input->post('input_deskripsi'),
			'harga' => $this->input->post('harga'),
			'kategori' => $this->input->post('kategori'),
			'modified_by' => $this->session->userdata('id_user'),
        	'modified_date' => date("Y-m-d H:i:s"),
		);

		$where = array(
			'id_produk' => $this->input->post('id'),
		);

       $this->Home_m->update_data($where,$data,'tbl_produk');

       echo $this->session->set_flashdata('pesan', ' 
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    data berhasil di-edit
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');

			redirect(base_url("Admin?page=produk"));
		// print_r($data) ;
	}

	public function ubah_gambar()
	{
		$data = array();
		$upload = $this->Home_m->upload();

		if($upload['result'] == "success"){

			$data = array(
				'gambar' => $upload['file']['file_name'],
				'modified_by' => $this->session->userdata('id_user'),
	        	'modified_date' => date("Y-m-d H:i:s"),
			);

			$where = array(
				'id_produk' => $this->input->post('id'),
			);

	       $this->Home_m->update_data($where,$data,'tbl_produk');

			echo $this->session->set_flashdata('pesan', ' 
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    Gambar berhasil diubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');

			redirect(base_url("Admin?page=produk"));
		}
		else{
			echo $data['message'] = $upload['error'];
			echo $this->session->set_flashdata('pesan', ' 
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> 
                    '.$data['message'].'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
			redirect(base_url("Admin?page=produk"));
		}
	}

	public function hapus_produk()
	{
		$id = $this->input->post('id');

		$where = array(
			' 	id_produk' => $id,
		);

       $this->Home_m->hapus_data($where,'tbl_produk');

		echo $this->session->set_flashdata('pesan', ' 
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    data berhasil dihapus
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');

		redirect(base_url("Admin?page=produk"));
	}
}
?>

	