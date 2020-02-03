<?php
defined('BASEPATH') or exit ('No direct script allowed');

class M_golonganmargin extends CI_Model{
	private $_table="golonganmargin";
	public $produk_id;

	public function rules()
    {
        return [
            ['field' => 'namagolongan',
            'label' => 'Nama Golongan Margin',
            'rules' => 'required']
        ];
    }
	function getALlGolonganMargin(){
		return $this->db->get($this->_table)->result();
	}

	public function save(){
		$post = $this->input->post();
		$data = array('namagolongan' => $post['namagolongan'],
  							'marginresep' => $post['marginresep'],
  							'marginnonresep' =>  $post['marginnonresep'],
  							'status' => $post['status']);
        $this->db->insert($this->_table, $data);
	}

	public function getGolonganMarginByID($id){
    	//return $this->db->get('produk')->result();
    	$this->db->select('*');
		$this->db->from($this->_table);
		//$this->db->join('hargaproduk', 'produk.barcode=hargaproduk.barcode','left');
		$this->db->where('id',$id);
		//$this->db->group_by('produk.produk_id');		
		//$this->db->where("usertype !=","admin");
		//return $this->db->get()->result();
		// if return row use this $produks->barcode
		//if return row_array user this $produks['barcode'] in view
		return $this->db->get()->row_array(); // for single row without foreach 
    }

     public function update($id){
        $post = $this->input->post();
        $data = array('namagolongan' => $post['namagolongan'],
                'marginresep' => $post['marginresep'],
                'marginnonresep' =>  $post['marginnonresep'],
                'status' => $post['status']);
        $this->db->where('id', $id);
        $this->db->update($this->_table, $data);        
     }

  function delete($id){        
        $this->db->where('id', $id);
        $result=$this->db->delete('golonganmargin');
        return $result;
    }
}