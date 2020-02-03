<?php
defined('BASEPATH') or exit ('No direct script allowed');

class Jeniskontak extends CI_Controller{

	function __Construct(){
		parent::__Construct();
	}

	function index(){
		$this->load->view('v_jeniskontak');
	}

	function show(){
		$data = $this->M_jeniskontak->list();
		json_encode($data);
	}

	function save(){
		$data = $this->M_jeniskontak->saveJenis();
		json_encode($data);
	}

	function update(){
		$data = $this->M_jeniskontak->updateJenis();
		json_encode($data);
	}

	function delete(){
		$data = $this->M_jeniskontak->deleteJenis();
		json_encode($data);
	}
}