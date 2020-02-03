<?php
defined('BASEPATH') or exit('No Direct script allowed');
class Home extends CI_Controller{

	function __Construct(){
		parent::__Construct();
		$this->load->library('session');
	}

	function index(){		
		$this->load->library('session');
		//echo $this->session->userdata('namauser');
		//echo $_SESSION['username'];
		if (isset($_SESSION['logged_in'])) {
			$level = $this->session->userdata('level');
			if ($level=="admin") {
				$this->load->view('home');
			}else if($level=="kasir"){
				redirect(base_url('auth/logout'));
			}
		}else{				
			redirect('auth');
		}
		
	}

	function input(){
		$this->load->view('inputpaket');
	}

	function logout(){
		$array_items = array('username', 'email','logged_in');
		$this->session->unset_userdata($array_items);
		redirect(base_url(''));
	}
}