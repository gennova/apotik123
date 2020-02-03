<?php
defined('BASEPATH') or exit ('No direct script allowed');

class GolMargin extends CI_Controller{

	function __Construct(){
		parent::__Construct();
		$this->load->model('M_golonganmargin');	
        $this->load->library('form_validation');
        $this->load->helper('rupiah_helper');	
	}

	function index(){		
		$data["golonganmargins"] = $this->M_golonganmargin->getAllGolonganMargin();
		$this->load->view('v_golonganmargin',$data);
	}

	public function insert(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->M_golonganmargin->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_golonganmargin_insert');
                }	else {
                	$this->M_golonganmargin->save();
                	redirect(base_url('golmargin'));
                }
	}

	function update($id){
		$golonganmargin = $this->M_golonganmargin;		
		$data["golonganmargin"] = $golonganmargin->getGolonganMarginByID($id);
		//echo $data['supplier']['namasupplier']; //supplier found test
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($golonganmargin->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_golonganmargin_update',$data);
                }	else {
                	$this->load->view("v_golonganmargin",$data);
                }		       

	}

	function update_process($id){
		$data["golonganmargins"] = $this->M_golonganmargin->getAllGolonganMargin();
		$golonganmargin = $this->M_golonganmargin;		
		$data["golonganmargin"] = $golonganmargin->getGolonganMarginByID($id);
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($golonganmargin->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_golonganmargin_update',$data);
                }	else {
                	$golonganmargin->update($id);
                	redirect(base_url('golmargin'));
                }

	}

    function delete($id){
        $this->M_golonganmargin->delete($id);
        redirect(base_url('golmargin'));
    }
}