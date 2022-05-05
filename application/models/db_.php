<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class db_ extends CI_Model{
	function tampil_akun(){
        $querytable = 'select * from akun where npm not in(select npm from akun where npm='.$this->session->userdata('npm').')order by npm asc';
        $table = $this->db->query($querytable);
        return $table;
	}
	function cek_shift(){
		$shift='select * from jadwal_kuliah where npm ='.$this->session->userdata('npm');
		$cekshift=$this->db->query($shift);
		return $cekshift;
	}
	function cek_praktik(){
		$praktik='select * from jadwal_praktik';
		$cekpraktik=$this->db->query($praktik);
		return $cekpraktik;
	}
	function cek_npm(){
		$data_npm='select count(*) as jml from akun where npm not in(select npm from jadwal_kuliah)';
		$cek_npm=$this->db->query($data_npm);
		$hsl=$cek_npm->row();
		return $hsl->jml;
	}
	function cek_nama(){
		$data_nama='select*from akun where npm not in(select npm from jadwal_kuliah)';
		$cek_nama=$this->db->query($data_nama);
		return $cek_nama;
	}
}