<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class table extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('db_');
		$this->load->library('form_validation');
	}
	function add(){
		if($this->session->userdata('lvl')=='Admin'){
			$data=[
				'title'=>'Admin',
				'color'=>'primary',
				'hide1'=>'',
				'hide2'=>'',
				'state'=>'active',
				'record'=>$this->db_->tampil_akun()
			];
			$this->_regis($data);
		}else if($this->session->userdata('lvl')=='Programmer'){
			$data=[
				'title'=>'Programmer',
				'color'=>'secondary',
				'hide1'=>'',
				'hide2'=>'hidden',
				'state'=>'active',
				'record'=>$this->db_->tampil_akun()
			];
			$this->_regis($data);
		}else{
			redirect('user');
		}
	}
	private function _regis($data){
		$this->form_validation->set_rules('uname','username','required|trim|min_length[3]|max_length[10]|is_unique[akun.uname]',[
				'required'=>'Username dibutuhkan!',
				'min_length'=>'Karakter kurang dari 3!',
				'is_unique'=>'Username sudah diambil'
		]);
		$this->form_validation->set_rules('nama','nama','required|trim|min_length[5]|max_length[25]',[
			'required'=>'Nama dibutuhkan!',
			'min_length'=>'Karakter kurang dari 5!'
		]);
		$this->form_validation->set_rules('lvl','level','required|trim|in_list[Admin,Asisten,Programmer]',[
			'required'=>'Jabatan dibutuhkan!',
			'in_list'=>'Jabatan tersebut tidak terdaftar'
		]);
		$this->form_validation->set_rules('npm','npm','required|trim|min_length[8]|max_length[8]|is_unique[akun.npm]',[
			'required'=>'NPM dibutuhkan!',
			'min_length'=>'Karakter kurang dari 8!',
			'max_length'=>'Karakter tidak lebih dari 8!',
			'is_unique'=>'NPM sudah terdaftar'
		]);
		$this->form_validation->set_rules('pass','password','required|trim|min_length[4]',[
			'required'=>'Password dibutuhkan!',
			'min_length'=>'Karakter kurang dari 4!'
		]);
		if($this->form_validation->run()==false){
			$this->session->set_flashdata('tabel','<div class="alert alert-danger alert-dismissible fade show" role="alert">Terjadi kesalahan, silahkan klik +Tambah lagi!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');

			$this->load->view('dash/dash_header',$data);
			$this->load->view('dash/dash_table',$data);
			$this->load->view('dash/dash_footer');
		}else{
			$datanew=[
				'uname'=>htmlspecialchars($this->input->post('uname',true)),
				'nama'=>htmlspecialchars($this->input->post('nama',true)),
				'level'=>$this->input->post('lvl'),
				'npm'=>htmlspecialchars($this->input->post('npm',true)),
				'pass'=>md5($this->input->post('pass'))
			];
			$this->db->insert('akun',$datanew);
			$this->session->set_flashdata('tabel','<div class="alert alert-success alert-dismissible fade show" role="alert">Akun baru sudah terdaftar. Silahkan Login!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
			redirect('user/table');
		}
	}
	function del(){
		if($this->session->userdata('lvl')=='Admin'){
			$data=[
				'title'=>'Admin',
				'color'=>'primary',
				'hide1'=>'',
				'hide2'=>'',
				'state'=>'active',
				'record'=>$this->db_->tampil_akun()
			];
			$this->_del($data);
		}else if($this->session->userdata('lvl')=='Programmer'){
			$data=[
				'title'=>'Programmer',
				'color'=>'secondary',
				'hide1'=>'',
				'hide2'=>'hidden',
				'state'=>'active',
				'record'=>$this->db_->tampil_akun()
			];
			$this->_del($data);
		}else{
			redirect('user');
		}
	}
	private function _del($data){
		$this->form_validation->set_rules('uname','username','required|trim|min_length[3]|max_length[10]',[
				'required'=>'Username dibutuhkan!',
				'min_length'=>'Karakter kurang dari 3!',
		]);
		if($this->form_validation->run()==false){
			$this->session->set_flashdata('tabel','<div class="alert alert-danger alert-dismissible fade show" role="alert">Terjadi kesalahan, silahkan klik Hapus lagi!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
			$this->load->view('dash/dash_header',$data);
			$this->load->view('dash/dash_table',$data);
			$this->load->view('dash/dash_footer');
		}else{
			$datadel=htmlspecialchars($this->input->post('uname',true));
			$akun=$this->db->get_where('akun',['uname'=>$datadel])->row_array();
			if($akun){
				$this->db->delete('akun',['uname'=>$datadel]);
				$this->db->delete('jadwal_kuliah',['npm'=>$akun['npm']]);
				$this->session->set_flashdata('tabel','<div class="alert alert-warning alert-dismissible fade show" role="alert">Akun sudah dihapus!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
				redirect('user/table');
			}else{
				$this->session->set_flashdata('tabel','<div class="alert alert-danger alert-dismissible fade show" role="alert">Akun tidak tersedia, silahkan cek Usernamenya kembali!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
				redirect('user/table');
			}
		}
	}
}