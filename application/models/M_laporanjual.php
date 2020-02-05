<?php
defined('BASEPATH') or exit ('No direct script allowed');

class M_laporanjual extends CI_Model{
	private $_table="transaksi";
	public $produk_id;

	public function rules()
    {
        return [
            ['field' => 'kodesupplier',
            'label' => 'Supplier',
            'rules' => 'required'],
        ];
    }
	function getALlTransaksi(){
    $this->db->join('ajax_login_ci','transaksi.idkasir=ajax_login_ci.id');
		return $this->db->get($this->_table)->result();
	}

	public function save(){
		$post = $this->input->post();
		$data = array('nosupplier' => $post['kodesupplier'],
  							'namasupplier' => $post['namasupplier'],
  							'email' =>  $post['emailsupplier'],
  							'telpon' => $post['telponsupplier'],
  							'alamat' => $post['alamatsupplier'],
  							'namasales' => $post['namasales'],
  							'telponsales' => $post['kontaksales'],
							'keterangan' => $post['keterangansales']);
        $this->db->insert($this->_table, $data);
	}

	public function getLaporanPenjualanDetailByID($id){
    	//return $this->db->get('produk')->result();
    $this->db->select('*');
		$this->db->from($this->_table);
    $this->db->join('detailtransaksi','transaksi.kodetransaksi=detailtransaksi.transaksi');
    $this->db->join('produk','transaksi.barcode=produk.barcode');
		//$this->db->join('hargaproduk', 'produk.barcode=hargaproduk.barcode','left');
		$this->db->where('id',$id);
		//$this->db->group_by('produk.produk_id');		
		//$this->db->where("usertype !=","admin");
		//return $this->db->get()->result();
		// if return row use this $produks->barcode
		//if return row_array user this $produks['barcode'] in view
		//return $this->db->get()->row_array(); // for single row without foreach 
    return $this->db->get()->result();
    }

     public function update($id){
        $post = $this->input->post();
        $data = array('nosupplier' => $post['kodesupplier'],
                'namasupplier' => $post['namasupplier'],
                'email' =>  $post['emailsupplier'],
                'telpon' => $post['telponsupplier'],
                'alamat' => $post['alamatsupplier'],
                'namasales' => $post['namasales'],
                'telponsales' => $post['kontaksales'],
                'keterangan' => $post['keterangansales']);
        $this->db->where('id', $id);
        $this->db->update($this->_table, $data);        
     }

  function delete($id){        
        $this->db->where('id', $id);
        $result=$this->db->delete('supplier');
        return $result;
    }
}