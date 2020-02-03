<?php
defined('BASEPATH') or exit('No direct script allowed');

class M_golongan extends CI_Model{
	private $_table = "golongan_produk";
	public $id;
	public $namagolongan;

	public function rules()
    {
        return [
            ['field' => 'namagolongan',
            'label' => 'Nama Golongan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    } 
}
