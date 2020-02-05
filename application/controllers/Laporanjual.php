<?php
defined('BASEPATH') or exit ('No direct script allowed');
class Laporanjual extends CI_Controller{	

	function __Construct(){
		parent::__Construct();
		$this->load->model('M_laporanjual');	
        $this->load->library('form_validation');
        $this->load->helper('rupiah_helper');	
	}

	function index(){		
		$data["transaksis"] = $this->M_laporanjual->getAllTransaksi();
		$this->load->view('v_laporan',$data);
	}

	public function insert(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->M_supplier->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_laporan');
                }	else {
                	$this->M_supplier->save();
                	redirect(base_url('laporanjual'));
                }
	}

	function update($id){
		$this->load->model('M_produk');
		$supplier = $this->M_supplier;		
		$data["supplier"] = $supplier->getSupplierByID($id);
		//echo $data['supplier']['namasupplier']; //supplier found test
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($supplier->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_supplier_update',$data);
                }	else {
                	//$supplier->save();
                	$this->load->view("v_supplier",$data);
                }		       

	}

	function update_process($id){
        $this->load->model('M_produk');
        $supplier = $this->M_supplier;      
        $data["supplier"] = $supplier->getSupplierByID($id);
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($supplier->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_supplier_update',$data);
                }	else {
                	$supplier->update($id);
                	redirect(base_url('supplier'));
                }

	}

    function delete($id){
        $this->M_supplier->delete($id);
        redirect(base_url('supplier'));
    }
}