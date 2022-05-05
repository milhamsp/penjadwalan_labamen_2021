<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
	}
	function index(){
		$this->form_validation->set_rules('uname','username','required|trim',[
			'required'=>'Username dibutuhkan!'
		]);
		$sess=$this->session->userdata('sess');
		if($sess==true){
			redirect('auth/login');
		}else{
			if($this->form_validation->run()==false){
				$this->login_v();
			}else{
				$this->_login();
			}
		}
	}
	private function login_v(){
		$this->load->view('auth/auth_header');
		$this->load->view('auth/login');
		$this->load->view('auth/auth_footer');
	}
	private function _login(){
		$uname=$this->input->post('uname');
		$akun=$this->db->get_where('akun',['uname'=>$uname])->row_array();
		if($akun){
			$data=[
					'uname'=>$akun['uname'],
					'nama'=>$akun['nama'],
					'lvl'=>$akun['level'],
					'npm'=>$akun['npm'],
					'sess'=>true
			];
			$this->session->set_userdata($data);
			$this->login();
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">Maaf akun anda tidak terdaftar!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}
	}
	function login(){
		$this->form_validation->set_rules('pass','password','required',[
			'required'=>'Password dibutuhkan!'
		]);
		$logged=$this->session->userdata('logged');
		if($logged==true){
			redirect('user');
		}else{
			if($this->form_validation->run()==false){
				$this->login_v2();
			}else{
				$this->__login();
			}
		}
	}
	private function login_v2(){
		$this->load->view('auth/auth_header');
		$this->load->view('auth/login_');
		$this->load->view('auth/auth_footer');
	}
	private function __login(){
		$uname=$this->session->userdata('uname');
		$pass=md5($this->input->post('pass'));
		$akun_p=$this->db->get_where('akun',['pass'=>$pass])->row_array();
		if($akun_p){
			$data=[
				'logged'=>true
			];
			$this->db->update('akun',['login_terakhir'=>date('Y-m-d H:i:s')],['uname'=>$uname]);
			$this->session->set_userdata($data);
			redirect('user');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">Password anda salah!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
			$this->load->view('auth/auth_header');
			$this->load->view('auth/login_');
			$this->load->view('auth/auth_footer');
		}
	}
	function logout(){
		$data=[
			'uname','nama','lvl','npm','sess','logged'
		];
		$this->session->unset_userdata($data);
		$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">Anda berhasil Logout!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
		redirect('auth');
	}
	function edit(){
		$this->form_validation->set_rules('nama','nama','required|trim|min_length[5]|max_length[25]',[
			'required'=>'Nama dibutuhkan!',
			'min_length'=>'Karakter kurang dari 5!'
		]);
		if($this->form_validation->run()==false){
			if($this->session->userdata('lvl')=='Admin'){
				$data=[
					'title'=>'Admin',
					'color'=>'primary',
					'hide1'=>'',
					'hide2'=>'',
					'state'=>'active'
				];
				$this->_edit($data);
			}else if($this->session->userdata('lvl')=='Programmer'){
				$data=[
					'title'=>'Programmer',
					'color'=>'secondary',
					'hide1'=>'',
					'hide2'=>'hidden',
					'state'=>'active'
				];
				$this->_edit($data);
			}else if($this->session->userdata('lvl')=='Asisten'){
				$data=[
					'title'=>'Asisten',
					'color'=>'info',
					'hide1'=>'hidden',
					'hide2'=>'hidden',
					'state'=>'active'
				];
				$this->_edit($data);
			}
		}else{
			$npm=$this->session->userdata('npm');
			$nama=htmlspecialchars($this->input->post('nama',true));
			$this->db->update('akun',['nama'=>$nama],['npm'=>$npm]);
			$this->session->set_userdata(['nama'=>$nama]);
			$this->session->set_flashdata('profil','<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, akun anda sudah diperbarui!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
			redirect('user/profile');
		}
	}
	private function _edit($data){
		$this->load->view('dash/dash_header',$data);
		$this->load->view('dash/dash_profile_ed',$data);
		$this->load->view('dash/dash_footer');
	}
}