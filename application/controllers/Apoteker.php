<?php
defined('BASEPATH') or exit ('No direct script alalowed');

class Apoteker extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_apoteker');
	}
	function index(){
		$this->load->view('apoteker');
	}
	function showING(){
		$data=$this->M_apoteker->employeeList();
		echo json_encode($data);
	}
	function save(){
		$data=$this->M_apoteker->saveEmp();
		echo json_encode($data);
	}
	function update(){
		$data=$this->M_apoteker->updateEmp();
		echo json_encode($data);
	}
	function delete(){
		$data=$this->M_apoteker->deleteEmp();
		echo json_encode($data);
	}
}