<?php
defined('BASEPATH') or exit ('No direct script alalowed');

class Produk extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_produk");
		$this->load->model("M_golongan");
		$this->load->model('M_kemasan');
		$this->load->model('M_hargaproduk');
		$this->load->model('M_golonganmargin');
        $this->load->library('form_validation');
        $this->load->helper('rupiah_helper');
	}
	function index(){
		$data["golongan"] = $this->M_golongan->getAll();
		$data["kemasan"] = $this->M_kemasan->getAll();
		$data["produks"] = $this->M_produk->getAllProduk();
		$this->load->helper('url');		
		$this->load->view('v_produk',$data);
	}

	function insert(){
		$product = $this->M_produk;		
		$data["golongans"] = $this->M_golongan->getAll();
		$data["kemasan"] = $this->M_kemasan->getAll();
		$data["produks"] = $this->M_produk->getAllProduk();
		$data['golonganmargins'] = $this->M_golonganmargin->getALlGolonganMargin();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($product->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_produk_insert',$data);
                }	else {
                	$product->save();
                	redirect(base_url('produk'));
                }

	}

	function update($produk_id){
		$product = $this->M_produk;		
		$data["golongans"] = $this->M_golongan->getAll();
		$data["kemasan"] = $this->M_kemasan->getAll();
		$data["produks"] = $this->M_produk->getProdukByBarcode($produk_id);
		$data["hargaproduk"] = $this->M_hargaproduk->getByBarcode($data['produks']['barcode']);	
		$data['golonganmargins'] = $this->M_golonganmargin->getALlGolonganMargin();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($product->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_produk_update',$data);
                }	else {
                	//$product->save();
                	$this->load->view("v_produk",$data);
                }		       
	}

	function update_process($produk_id,$barcode){
		$product = $this->M_produk;		
		$data["golongans"] = $this->M_golongan->getAll();
		$data["kemasan"] = $this->M_kemasan->getAll();
		$data["produks"] = $this->M_produk->getAllProduk();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($product->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_produk_update',$data);
                }	else {
                	$product->update($produk_id,$barcode);
                	redirect(base_url('produk'));
                }
	}

	function delete($produk_id){
		$data=$this->M_produk->delete_product($produk_id);
		redirect(base_url('produk'));
	}

	function test(){
		$x['data']=$this->M_produk->get_produkall();
		$this->load->view('v_produk_test',$x);
	}

	function get_produk_byID($id){		
		$data=$this->M_produk->get_produkbyid($id);
		echo json_encode($data);
	}
}