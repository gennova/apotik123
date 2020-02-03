<?php
defined('BASEPATH') or exit ('No direct script allowed');

class M_kemasan extends CI_Model{
	private $_table = "kemasan";
	public $id;
	public $namakemasan;

	public function getAll(){
		 return $this->db->get($this->_table)->result();
	}

	public function getKemasanByID($id){
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('id',$id);
		return $this->db->get->row_array();
	}
}