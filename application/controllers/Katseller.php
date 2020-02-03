<?php
defined('BASEPATH') or exit ('No direct script allowed');

class Katseller extends CI_Controller{
	function __Construct(){
		parent::__Construct();
		$this->load->model('M_katpembeli');
	}

	function index(){
		$this->load->view('kategoripembeli');
	}

	function show(){
		$data = $this->M_katpembeli->kat_pembeli_list();
		echo json_encode($data);
	}

	function save(){
		$data = $this->M_katpembeli->save();
		echo json_encode($data);
	}

	function update(){
		$data = $this->M_katpembeli->update();
		echo json_encode($data);
	}

	function delete(){
		$data = $this->M_katpembeli->delete();
		echo json_encode($data);
	}
}