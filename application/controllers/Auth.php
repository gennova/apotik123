<?php
defined('BASEPATH') or exit('No Direct script allowed');

class Auth extends CI_Controller{

	public function __Construct()
	{
		parent::__Construct();
		$this->load->model('Auth_model');
		$this->load->library('session');
	}

	public function index()
    {
            $this->load->view('v_login');
    }
         
        public function logout(){
            $this->session->sess_destroy();
            redirect('auth' ,'refresh');
            exit;
        }
         
        public function login(){
            $username =  $this->input->post('username');
            $password =  $this->input->post('password');
             
            //call the model for auth
            if( $this->Auth_model->login($username, $password)==1){
            echo "SUKSES";
            	//redirect('home');
            $level = $this->session->userdata('level');
			if ($level=="admin") {
				redirect('home');
			}else if($level=="kasir"){
				redirect('eceran');
			}
            }else{
            	echo "GAGAL";
            }
        }
}