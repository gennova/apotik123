<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Transaksi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("M_transaksi");
		$this->load->library('form_validation');
        $this->load->helper('rupiah_helper');
        $this->load->helper(array('form', 'url'));

	}

	function index(){

	}

	function save(){				
		$transaksi = $this->M_transaksi;		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($transaksi->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('person_view',$data);
                }	else {
                	$transaksi->insert();
                	redirect(base_url('eceran'));
                }
	}
	function lihatdetailtrxbyid($trx){
        $this->load->model('M_transaksi');
        $transaksi = $this->M_transaksi;      
        $data["detailtransaksis"] = $transaksi->getDetailTransaksiByID($trx);
		$this->load->helper(array('form', 'url'));
        $this->load->view('v_detail_transaksi',$data); 
	}
}