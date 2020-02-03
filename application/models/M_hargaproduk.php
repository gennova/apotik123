<?php
defined('BASEPATH') or exit('No direct script allowed');

class M_hargaproduk extends CI_Model{
	private $_table = "hargaproduk";
	public $id;
	public $barcode;
	public $jenisharga;
	public $hna;
	public $marginresep;
	public $marginnonresep;
	public $hargajual;
	public $hargajualnonresep;

	public function getAll(){
		return $this->db->get($this->_table)->result();
	}

	public function getByBarcode($barcode){
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('barcode',$barcode);
		//$this->db->where("usertype !=","admin");
		return $this->db->get()->row_array();
	}

	function get_produkbybarcode($barcode){
        $hasil=$this->db->query("SELECT *, sum(stokbarang.stoka) as 'jumlahstoka' FROM hargaproduk join stokbarang on hargaproduk.barcode = stokbarang.barcode WHERE hargaproduk.barcode='$barcode' group by stokbarang.barcode");
        return $hasil->result();
    }
}