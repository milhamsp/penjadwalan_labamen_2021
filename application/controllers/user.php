<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('db_');
		$this->load->library('form_validation');
	}
	function index(){
		if($this->session->userdata('lvl')=='Admin'){
			$data=[
				'title'=>'Admin',
				'color'=>'primary',
				'hide1'=>'',
				'hide2'=>'',
				'state'=>'active',
				'cek'=>$this->db_->cek_npm(),
				'cek2'=>$this->db_->cek_nama()
			];
			$this->_dash($data);
		}else if($this->session->userdata('lvl')=='Programmer'){
			$data=[
				'title'=>'Programmer',
				'color'=>'secondary',
				'hide1'=>'',
				'hide2'=>'hidden',
				'state'=>'active',
				'cek'=>$this->db_->cek_shift()
			];
			$this->_jadwal($data);
		}else if($this->session->userdata('lvl')=='Asisten'){
			$data=[
				'title'=>'Asisten',
				'color'=>'info',
				'hide1'=>'hidden',
				'hide2'=>'hidden',
				'state'=>'active',
				'cek'=>$this->db_->cek_shift()
			];
			$this->_jadwal($data);
		}else{
			redirect('auth/');
		}
	}
	private function _dash($data){	
		$this->load->view('dash/dash_header',$data);
		$this->load->view('dash/dash_def',$data);
		$this->load->view('dash/dash_footer');
	}
	private function _jadwal($data){
		$this->load->view('dash/dash_header',$data);
		$this->load->view('penjadwalan/jadwal',$data);
		$this->load->view('dash/dash_footer');
	}
	function table(){
		if($this->session->userdata('lvl')=='Admin'){
			$data=[
				'title'=>'Admin',
				'color'=>'primary',
				'hide1'=>'',
				'hide2'=>'',
				'state'=>'active',
				'record'=>$this->db_->tampil_akun()
			];
			$this->_table($data);
		}else if($this->session->userdata('lvl')=='Programmer'){
			$data=[
				'title'=>'Programmer',
				'color'=>'secondary',
				'hide1'=>'',
				'hide2'=>'hidden',
				'state'=>'active',
				'record'=>$this->db_->tampil_akun()
			];
			$this->_table($data);
		}else{
			redirect('user');
		}
	}
	private function _table($data){
		$this->load->view('dash/dash_header',$data);
		$this->load->view('dash/dash_table',$data);
		$this->load->view('dash/dash_footer');
	}
	function profile(){
		if($this->session->userdata('lvl')=='Admin'){
			$data=[
				'title'=>'Admin',
				'color'=>'primary',
				'hide1'=>'',
				'hide2'=>'',
				'state'=>'active'
			];
			$this->_profile($data);
		}else if($this->session->userdata('lvl')=='Programmer'){
			$data=[
				'title'=>'Programmer',
				'color'=>'secondary',
				'hide1'=>'',
				'hide2'=>'hidden',
				'state'=>'active'
			];
			$this->_profile($data);
		}else if($this->session->userdata('lvl')=='Asisten'){
			$data=[
				'title'=>'Asisten',
				'color'=>'info',
				'hide1'=>'hidden',
				'hide2'=>'hidden',
				'state'=>'active'
			];
			$this->_profile($data);
		}else{
			redirect('auth/');
		}
	}
	private function _profile($data){
		$this->load->view('dash/dash_header',$data);
		$this->load->view('dash/dash_profile',$data);
		$this->load->view('dash/dash_footer');
	}
	function edit(){
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
		}else{
			redirect('auth/');
		}
	}private function _edit($data){
		$this->load->view('dash/dash_header',$data);
		$this->load->view('dash/dash_profile_ed',$data);
		$this->load->view('dash/dash_footer');
	}
}