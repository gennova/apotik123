<?php
defined('BASEPATH') or exit ('No Direct script allowed');
class State extends CI_Controller{
	function __Construct(){
		parent::__Construct();
		$this->load->library('session');
	}

	function index(){
		if (!isset($myObj)) 
    	$myObj = new stdClass();
		$myObj->name_apotik = "Indonesia Sehat";
		$myObj->alamat = "Semarang";
		$myObj->city = "New York";
		$myObj->kontak = array("Volvo", "BMW", "Toyota");
		$myJSON = json_encode($myObj);
		echo $myJSON;

	}
	function pemrograman(){
		echo "MENGHILANGKAN INDEX.PHP PADA CODEIGNITER | MALASNGODING.COM";
	}
}