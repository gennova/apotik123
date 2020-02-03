<?php
defined('BASEPATH') or exit('No direct script allowed');

class Homelogin extends CI_Controller{

public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');
        }

        public function index(){
            $this->Auth_model->isLoggedIn();
            $this->load->view('home');
	}

}
