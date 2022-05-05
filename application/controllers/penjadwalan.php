<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjadwalan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('db_');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
	}
	function index(){
		if($this->session->userdata('lvl')=='Admin'){
			$data=[
				'title'=>'Admin',
				'color'=>'primary',
				'hide1'=>'',
				'hide2'=>'',
				'state'=>'active',
				'cek'=>$this->db_->cek_shift(),
				'cek2'=>$this->db_->cek_praktik()
			];
			$this->lihat_jadwal($data);
		}else if($this->session->userdata('lvl')=='Programmer'){
			$data=[
				'title'=>'Programmer',
				'color'=>'secondary',
				'hide1'=>'',
				'hide2'=>'hidden',
				'state'=>'active',
				'cek'=>$this->db_->cek_shift()
			];
			$this->lihat_jadwal($data);
		}else if($this->session->userdata('lvl')=='Asisten'){
			$data=[
				'title'=>'Asisten',
				'color'=>'info',
				'hide1'=>'hidden',
				'hide2'=>'hidden',
				'state'=>'active',
				'cek'=>$this->db_->cek_shift()
			];
			$this->lihat_jadwal($data);
		}else{
			redirect('auth/');
		}
	}
	private function lihat_jadwal($data){
		$this->load->view('dash/dash_header',$data);
		$this->load->view('penjadwalan/jadwal',$data);
		$this->load->view('dash/dash_footer');
	}
	function input_jadwal(){
		if($this->session->userdata('lvl')=='Admin'){
			$data=[
				'title'=>'Admin',
				'color'=>'primary',
				'hide1'=>'',
				'hide2'=>'',
				'state'=>'active',
				'cek'=>$this->db_->cek_shift(),
				'cek2'=>$this->db_->cek_praktik()
			];
			$this->_input_jadwal($data);
		}else if($this->session->userdata('lvl')=='Programmer'){
			$data=[
				'title'=>'Programmer',
				'color'=>'secondary',
				'hide1'=>'',
				'hide2'=>'hidden',
				'state'=>'active',
				'cek'=>$this->db_->cek_shift(),
			];
			$this->_input_jadwal($data);
		}else if($this->session->userdata('lvl')=='Asisten'){
			$data=[
				'title'=>'Asisten',
				'color'=>'info',
				'hide1'=>'hidden',
				'hide2'=>'hidden',
				'state'=>'active',
				'cek'=>$this->db_->cek_shift()
			];
			$this->_input_jadwal($data);
		}else{
			redirect('auth/');
		}
	}
	private function _input_jadwal($data){
		$this->load->view('dash/dash_header',$data);
		$this->load->view('penjadwalan/jadwal_ed',$data);
		$this->load->view('dash/dash_footer');
	}
	function submit(){
		$validasi=$this->session->userdata('logged');
		$npm=$this->session->userdata('npm');
		$ceknpm=$this->db->get_where('jadwal_kuliah',['npm'=>$npm])->row_array();
		if($ceknpm==true){
			foreach(array(1,2,3,4) as $shift):
				foreach (array('senin','selasa','rabu','kamis','jumat') as $day):
					$data=[$day.'_s'.$shift=>$this->input->post($day.'_s'.$shift)];
					$this->db->where('npm',$npm);
					$this->db->update('jadwal_kuliah',$data);
				endforeach;
			endforeach;
			$this->db->update('jadwal_kuliah',['waktu_edit'=>date('Y-m-d H:i:s')],['npm'=>$npm]);
			$this->session->set_flashdata('jadwal','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Jadwal Kuliah anda sudah diperbarui!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
			redirect('penjadwalan');
		}else{
			$data=[
					'npm'=>$npm,
					'senin_s1'=>$this->input->post('senin_s1'),
					'senin_s2'=>$this->input->post('senin_s2'),
					'senin_s3'=>$this->input->post('senin_s3'),
					'senin_s4'=>$this->input->post('senin_s4'),
					'selasa_s1'=>$this->input->post('selasa_s1'),
					'selasa_s2'=>$this->input->post('selasa_s2'),
					'selasa_s3'=>$this->input->post('selasa_s3'),
					'selasa_s4'=>$this->input->post('selasa_s4'),
					'rabu_s1'=>$this->input->post('rabu_s1'),
					'rabu_s2'=>$this->input->post('rabu_s2'),
					'rabu_s3'=>$this->input->post('rabu_s3'),
					'rabu_s4'=>$this->input->post('rabu_s4'),
					'kamis_s1'=>$this->input->post('kamis_s1'),
					'kamis_s2'=>$this->input->post('kamis_s2'),
					'kamis_s3'=>$this->input->post('kamis_s3'),
					'kamis_s4'=>$this->input->post('kamis_s4'),
					'jumat_s1'=>$this->input->post('jumat_s1'),
					'jumat_s2'=>$this->input->post('jumat_s2'),
					'jumat_s3'=>$this->input->post('jumat_s3'),
					'jumat_s4'=>$this->input->post('jumat_s4'),
					'validasi'=>$validasi
				];
				$this->db->insert('jadwal_kuliah',$data);
			$this->db->update('jadwal_kuliah',['waktu_input'=>date('Y-m-d H:i:s')],['npm'=>$npm]);
			$this->session->set_flashdata('jadwal','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Jadwal Kuliah anda sudah terdaftar!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
			redirect('penjadwalan');
		}
	}
	function jadwal_praktik(){
		if($this->session->userdata('lvl')=='Admin'){
			$data=[
				'title'=>'Admin',
				'color'=>'primary',
				'hide1'=>'',
				'hide2'=>'',
				'state'=>'active',
				'cek'=>$this->db_->cek_shift(),
				'cek2'=>$this->db_->cek_praktik()
			];
			$this->lihat_praktik($data);
		}else{
			redirect('user');
		}
	}
	private function lihat_praktik($data){
		$this->load->view('dash/dash_header',$data);
		$this->load->view('penjadwalan/jadwal_praktik',$data);
		$this->load->view('dash/dash_footer');
	}
	function input_praktik(){
		if($this->session->userdata('lvl')=='Admin'){
			$data=[
				'title'=>'Admin',
				'color'=>'primary',
				'hide1'=>'',
				'hide2'=>'',
				'state'=>'active',
				'cek'=>$this->db_->cek_shift(),
				'cek2'=>$this->db_->cek_praktik()
			];
			$this->_input_praktik($data);
		}else{
			redirect('user');
		}
	}
	private function _input_praktik($data){
		$this->load->view('dash/dash_header',$data);
		$this->load->view('penjadwalan/jadwal_praktik_ed',$data);
		$this->load->view('dash/dash_footer');
	}
	function submit_praktik(){
		$validasi=$this->session->userdata('logged');
		if($this->session->userdata('lvl')=='Admin'){
			$cekval=$this->db->get_where('jadwal_praktik',['validasi'=>$validasi])->row_array();
			if($cekval==true){
				foreach(array(1,2,3,4) as $shift):
					foreach (array('senin','selasa','rabu','kamis','jumat') as $day):
						$data=[$day.'_s'.$shift=>$this->input->post($day.'_s'.$shift)];
						$this->db->where('validasi',$validasi);
						$this->db->update('jadwal_praktik',$data);
					endforeach;
				endforeach;
				$this->db->update('jadwal_praktik',['waktu_edit'=>date('Y-m-d H:i:s')],['validasi'=>$validasi]);
				$this->session->set_flashdata('jadwal','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Jadwal Praktikum sudah diperbarui!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
				redirect('penjadwalan/jadwal_praktik');
			}else{
				$data=[
					'validasi'=>$validasi,
					'senin_s1'=>$this->input->post('senin_s1'),
					'senin_s2'=>$this->input->post('senin_s2'),
					'senin_s3'=>$this->input->post('senin_s3'),
					'senin_s4'=>$this->input->post('senin_s4'),
					'selasa_s1'=>$this->input->post('selasa_s1'),
					'selasa_s2'=>$this->input->post('selasa_s2'),
					'selasa_s3'=>$this->input->post('selasa_s3'),
					'selasa_s4'=>$this->input->post('selasa_s4'),
					'rabu_s1'=>$this->input->post('rabu_s1'),
					'rabu_s2'=>$this->input->post('rabu_s2'),
					'rabu_s3'=>$this->input->post('rabu_s3'),
					'rabu_s4'=>$this->input->post('rabu_s4'),
					'kamis_s1'=>$this->input->post('kamis_s1'),
					'kamis_s2'=>$this->input->post('kamis_s2'),
					'kamis_s3'=>$this->input->post('kamis_s3'),
					'kamis_s4'=>$this->input->post('kamis_s4'),
					'jumat_s1'=>$this->input->post('jumat_s1'),
					'jumat_s2'=>$this->input->post('jumat_s2'),
					'jumat_s3'=>$this->input->post('jumat_s3'),
					'jumat_s4'=>$this->input->post('jumat_s4'),
				];
				$this->db->insert('jadwal_praktik',$data);
				$this->db->update('jadwal_praktik',['waktu_input'=>date('Y-m-d H:i:s')],['validasi'=>$validasi]);
				$this->session->set_flashdata('jadwal','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Jadwal Praktikum sudah diperbarui!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
				redirect('penjadwalan/jadwal_praktik');
			}
		}else{
			redirect('user');
		}
	}
	function lihat_jaga(){
		if($this->session->userdata('lvl')=='Admin'){
			$data=[
				'title'=>'Admin',
				'color'=>'primary',
				'hide1'=>'',
				'hide2'=>'',
				'state'=>'active'
			];
			$this->jadwal_jaga($data);
		}else if($this->session->userdata('lvl')=='Programmer'){
			$data=[
				'title'=>'Programmer',
				'color'=>'secondary',
				'hide1'=>'',
				'hide2'=>'hidden',
				'state'=>'active'
			];
			$this->jadwal_jaga($data);
		}else if($this->session->userdata('lvl')=='Asisten'){
			$data=[
				'title'=>'Asisten',
				'color'=>'info',
				'hide1'=>'hidden',
				'hide2'=>'hidden',
				'state'=>'active'
			];
			$this->jadwal_jaga($data);
		}else{
			redirect('user');
		}
	}
	private function jadwal_jaga($data){
		$this->load->view('dash/dash_header',$data);
		$this->load->view('penjadwalan/jadwal_jaga',$data);
		$this->load->view('dash/dash_footer');
	}
	function reset(){
		$this->db->empty_table('jadwal_kuliah');
		$this->db->empty_table('jadwal_praktik');
		$this->session->set_flashdata('jaga','<div class="alert alert-warning alert-dismissible fade show" role="alert">Semua data inputan Jadwal Kuliah & Praktikum telah dihapus!<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button></div>');
		redirect('penjadwalan/lihat_jaga');
	}
}