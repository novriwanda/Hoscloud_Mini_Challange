<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('keranjang_model');
		$this->load->model('Home_m');
		$this->load->library('session');
	}

	public function index()
	{
		$kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['produk'] = $this->keranjang_model->get_produk_kategori($kategori);
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/list_produk',$data);
		$this->load->view('themes/footer');
	}
	public function tampil_cart()
	{
		if($this->session->userdata('status') != "login"){
			echo $this->session->set_flashdata('message', ' 
				<script>
		            $(document).ready(function(){
		                $("#myModal_login").modal("show");
		            });
		        </script>');
		        echo $this->session->set_flashdata('info_register', ' 
					<div class="alert danger">
		          <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> 
		          <strong>Gagal!!</strong> Silahkan login dulu, untuk melanjutkan belanja
		        </div>');
		        redirect(base_url("Page"));
			
		}
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/tampil_cart',$data);
		$this->load->view('themes/footer');
	}
	
	public function check_out()
	{
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/check_out',$data);
		$this->load->view('themes/footer');
	}
		
	function tambah()
	{
		$data_produk= array('id' => $this->input->post('id'),
							 'name' => $this->input->post('nama'),
							 'price' => $this->input->post('harga'),
							 'gambar' => $this->input->post('gambar'),
							 'qty' =>$this->input->post('qty')
							);
		$this->cart->insert($data_produk);
		redirect('shopping');
	}

	function hapus($rowid) 
	{
		if ($rowid=="all")
			{
				$this->cart->destroy();
			}
		else
			{
				$data = array('rowid' => $rowid,
			  				  'qty' =>0);
				$this->cart->update($data);
			}
		redirect('shopping/tampil_cart');
	}

	function ubah_cart()
	{
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$gambar = $cart['gambar'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array('rowid' => $rowid,
							'price' => $price,
							'gambar' => $gambar,
							'amount' => $amount,
							'qty' => $qty);
			$this->cart->update($data);
		}
		redirect('shopping/tampil_cart');
	}

	public function proses_order()
	{

		$result = $this->Home_m->hitung_data('tbl_order','id_order') ;
		echo $id_order = $result->num_rows()+1;
		//input data order
		$this->db->trans_start();

		$data_order = array(
			'id_order' => $id_order ,
			'id_user' => $this->session->userdata('id_user'),			
			'id_status' => '1',
			'alamat' => $this->input->post('alamat'),
			'no_telp ' => $this->input->post('telp'),
			'created_at ' => $this->session->userdata('id_user'),
			'modified_by' => $this->session->userdata('id_user'),
		);

		$this->Home_m->input_data($data_order,'tbl_order');
		//Input detail order	
		if ($cart = $this->cart->contents())
			{
				foreach ($cart as $item)
					{
						$data_detail = array(
							'id_order' => $id_order,
							'id_produk' => $item['id'],
							'id_user' => $this->session->userdata('id_user'),
							'jumlah' => $item['qty'],
							'created_at' => $this->session->userdata('id_user'),
							'modified_by' => $this->session->userdata('id_user'),
						);
						echo "<pre>";
						print_r($data_detail)	;
						echo "</pre>";
						$this->Home_m->input_data($data_detail,'tbl_detail_order');
					}
			}
		// //-------------------------Hapus shopping cart--------------------------		
		$this->cart->destroy();
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			echo $this->session->set_flashdata('message_login', ' 
				<div class="alert success">
	          <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</spl_autoload(class_name)n> 
	          <strong> Success!!</strong> Terima kasih sudah berbelanja di Drip Limited, Order anda sudah masuk ke database kami, dan dalam 3 x 24 Jam barang akan sampai di tempat anda.<br>
			Jangan segan mengontak kami jika ada permasalahan!
	        </div>');
			redirect(base_url("Shopping"));
		}
		else
		{
			echo $this->session->set_flashdata('message_login', ' 
				<div class="alert danger">
	          <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</spl_autoload(class_name)n> 
	          <strong> Error!!</strong> Anda kesalahan diwaktu Checkout
	        </div>');
			redirect(base_url("Shopping"));
		}
	}
}
?>