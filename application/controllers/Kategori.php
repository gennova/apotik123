<?php
defined('BASEPATH') or exit ('No direct script alalowed');

class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_kategori');
	}

	function index(){
		
	}

}