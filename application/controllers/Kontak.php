<?php
defined('BASEPATH') or exit('No direct script allowed');

class Kontak extends CI_Controller{
	function __Construct(){
		parent::__Construct();
		$this->load->library('form_validation');
        $this->load->helper('rupiah_helper');	
        $this->load->model('M_kontak');
        $this->load->model('M_katpembeli');
	}

	function index(){
		$data["kategorikontak"] = $this->M_katpembeli->kat_pembeli_list();
        $data["kontaks"] = $this->M_kontak->gelAllKontak();
		$this->load->view('v_kontak',$data);
	}

	public function insert(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $data["kategorikontak"] = $this->M_katpembeli->kat_pembeli_list();
        $this->form_validation->set_rules($this->M_kontak->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_kontak_insert',$data);
                }	else {
                	$this->M_kontak->save();
                	redirect(base_url('kontak'));
                }
	}

	function update($id){
		$data["kategorikontak"] = $this->M_katpembeli->kat_pembeli_list();
		$kontaks = $this->M_kontak;		
		$data["kontak"] = $kontaks->getKontakByID($id);
        $data["golongandarah"] = $this->M_kontak->getGolonganDarah();
		//echo $data['supplier']['namasupplier']; //supplier found test
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($kontaks->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_kontak_update',$data);
                }	else {
                	//$supplier->save();
                	$this->load->view("v_kontak",$data);
                }		       

	}

	function update_process($id){
		$kontak = $this->M_kontak;		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($kontak->rules());
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('v_supplier_update',$data);
                }	else {
                	$kontak->update($id);
                	redirect(base_url('kontak'));
                }

	}

    function delete($id){
        $this->M_kontak->delete($id);
        redirect(base_url('kontak'));
    }

    function deletewithoutid(){
        $post = $this->input->post();
        $id = $post['id'];
        $this->M_kontak->delete($id);
        redirect(base_url('kontak'));
    }

    function golongandarah(){
        $data = $this->M_kontak->getGolonganDarah();
    }

}