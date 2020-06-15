<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
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
			$data['produk'] = $this->keranjang_model->get_produk_all();
			$data['kategori'] = $this->keranjang_model->get_kategori_all();
			$this->load->view('themes/header',$data);
			$this->load->view('shopping/list_produk',$data);
			$this->load->view('themes/footer');
		}
	
	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$where = array(
			'email' => $email
		);
		$result = $this->Home_m->cek_data($where,'tbl_user') ;
		if($result->num_rows() > 0)
		{
			$data_login = $result->row() ;
			if ($password == $data_login->password || password_verify($password, $data_login->password))
			{
				if($data_login->role == "admin")
				{
					$data_session = array(
					'status' => 'login',
					'role' => 'admin',
					'id_user' => $data_login->id_user,
					'nama' => $data_login->nama,
					'birthday' => $data_login->birthday,
					'email' => $data_login->email,
					'created_by' => $data_login->create_by,
					'createdDate' => $data_login->createdDate,
					'modified_by' => $data_login->modified_by,
					'modified_date' => $data_login->modified_date,
					'is_active' => $data_login->is_active
					);
					
					$this->session->set_userdata($data_session);
					redirect(base_url("Admin"));
				}
				else
				{
					$data_session = array(
					'status' => 'login',
					'role' => 'user',
					'id_user' => $data_login->id_user,
					'nama' => $data_login->nama,
					'birthday' => $data_login->birthday,
					'email' => $data_login->email,
					'created_by' => $data_login->create_by,
					'createdDate' => $data_login->createdDate,
					'modified_by' => $data_login->modified_by,
					'modified_date' => $data_login->modified_date,
					'is_active' => $data_login->is_active
					);

					$this->session->set_userdata($data_session);
					echo $this->session->set_flashdata('message_login', ' 
						<div class="alert success">
			          <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> 
			          <strong>Login Success!!</strong> Selamat berbelanja
			        </div>');
					redirect(base_url("Shopping"));
					}
			}
			else
			{
				echo $this->session->set_flashdata('message', ' 
				<script>
		            $(document).ready(function(){
		                $("#myModal_login").modal("show");
		            });
		        </script>');
		        echo $this->session->set_flashdata('info_register', ' 
					<div class="alert danger">
		          <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> 
		          <strong>Gagal!!</strong> Password anda salah
		        </div>');
		        redirect(base_url("Page"));
			}
		}
		else
		{
			echo $this->session->set_flashdata('message', ' 
			<script>
	            $(document).ready(function(){
	                $("#myModal_login").modal("show");
	            });
	        </script>');
	        echo $this->session->set_flashdata('info_register', ' 
				<div class="alert danger">
	          <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> 
	          <strong>Gagal!!</strong> Email Anda Salah
	        </div>');
	        redirect(base_url("Page"));
		}
	}

	public function register()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password1 = $this->input->post('password1');
		$password2 = $this->input->post('password2');
		$birthday = date_format(date_create($this->input->post('birthday')), 'Y-m-d');

		if ($password1 == $password2) {
			$where = array(
			'email' => $email
			);
		
			$result = $this->Home_m->cek_data($where,'tbl_user') ;
			if($result->num_rows() > 0)
			{
				echo $this->session->set_flashdata('message', ' 
				<script>
		            $(document).ready(function(){
		                $("#myModal_register").modal("show");
		            });
		        </script>');
		        echo $this->session->set_flashdata('info_register', ' 
					<div class="alert danger">
		          <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> 
		          <strong>Gagal!!</strong> Email Sudah Tersedia
		        </div>');
		        redirect(base_url("Page"));
			}
			else
			{
				$data = array(
					'nama' => $nama,
					'email' => $email,
					'password' => password_hash($password1, PASSWORD_DEFAULT),
					'birthday' => $birthday
				);

				$this->Home_m->input_data($data,'tbl_user');

				echo $this->session->set_flashdata('message_login', ' 
					<div class="alert success">
		          <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> 
		          <strong> Congrats!! </strong> Silahkan Login
		        </div>');
					redirect(base_url("Page"));
			}
		}
		else{
			echo $this->session->set_flashdata('message', ' 
			<script>
	            $(document).ready(function(){
	                $("#myModal_register").modal("show");
	            });
	        </script>');
	        echo $this->session->set_flashdata('info_register', ' 
				<div class="alert danger">
	          <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> 
	          <strong>Gagal!!</strong> Password dan ulangi password tidak samaa
	        </div>');
	        redirect(base_url("Page"));
		}
	}

	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('Page'));
	}	
}
