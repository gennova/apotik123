<?php
defined('BASEPATH') or exit ('No direct script allowed');

class Hargaproduk extends CI_Controller{

	function __Construct(){
		parent::__Construct();
		$this->load->model('M_hargaproduk');
		
	}

	function index(){

	}

	function save(){

	}

	function get_hproduk_bybarcode($barcode){		
		$data=$this->M_hargaproduk->get_produkbybarcode($barcode);
		echo json_encode($data);
	}
}