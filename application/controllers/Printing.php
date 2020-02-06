<?php
defined('BASEPATH') or exit ('No Direct Script Allowed');

class Printing extends CI_Controller{

	function __Construct(){
		parent::__Construct();
	}

	function index(){
		$this->load->library("EscPos.php");

try {
		// Enter the device file for your USB printer here
	  // Enter the share name for your USB printer here
    $connector = new WindowsPrintConnector("POS58");
    /* Print a "Hello world" receipt" */
    $printer = new Escpos($connector);
    $printer -> text("Hello World!\n");
    $printer -> cut();

    /* Close printer */
    $printer -> close();
	} catch (Exception $e) {
	echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
	}
	}
}