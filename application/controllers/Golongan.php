<?php
defined('BASEPATH') or exit ('No direct script allowed');

class Golongan extends CI_Controller{
	public function __Construct(){
		parent::__construct();
		$this->load->model("M_golongan");
        $this->load->library('form_validation');
	}

	public function index(){
		$data["golongan"] = $this->M_golongan->getAll();
	}
}