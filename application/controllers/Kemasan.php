<?php
defined('BASEPATH') or exit("No Direct script allowed");

class Kemasan extends CI_Controller{

	public function __Construct(){
		parent::__construct();
		$this->load->model("M_kemasan");
        $this->load->library('form_validation');
	}

	public function index(){
		$data["kemasan"] = $this->M_kemasan->getAll();
	}
}
