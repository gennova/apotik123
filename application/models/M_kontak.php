<?php
defined('BASEPATH') or exit('No direct script allowed');

class M_kontak extends CI_Model{
	private $_table = "kontak";

	function rules(){
		return [['field' => 'namakontak',
				'label' => 'Nama Kontak',
				'rules' => 'required'],
				['field' => 'tgllahir',
				'label' => 'Tgl Lahir',
				'rules' => 'required']

			];
	}

	function gelAllKontak(){
		return $this->db->get($this->_table)->result();
	}

	function save(){
		$post = $this->input->post();
		$data = array('title' => $post['title'],
  							'nama' =>  $post['namakontak'],
  							'jeniskelamin' => $post['jeniskelamin'],
  							'golongandarah' => $post['golongandarah'],
  							'tgllahir' => $post['tgllahir'],
  							'tempatlahir' => $post['tempatlahir'],
							'telpon' => $post['telepon'],	
							'hp' => $post['hpwa'],
							'npwp' => $post['npwp'],
							'alamat' =>$post['alamat'],
							'keterangan' => $post['keterangan'],
							'status' => $post['status'],
							'kategorikontak' => $post['kategorikontak']
							);
        $this->db->insert($this->_table, $data);
	}

	function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete($this->_table);
	}

	public function getKontakByID($id){
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

    function getGolonganDarah(){
    	return $this->db->get('golongandarah')->result();
    }

    function update($id){
    	$post = $this->input->post();
		$data = array('title' => $post['title'],
  							'nama' =>  $post['namakontak'],
  							'jeniskelamin' => $post['jeniskelamin'],
  							'golongandarah' => $post['golongandarah'],
  							'tgllahir' => $post['tgllahir'],
  							'tempatlahir' => $post['tempatlahir'],
							'telpon' => $post['telepon'],	
							'hp' => $post['hpwa'],
							'npwp' => $post['npwp'],
							'alamat' =>$post['alamat'],
							'keterangan' => $post['keterangan'],
							'status' => $post['status'],
							'kategorikontak' => $post['kategorikontak']
							);
		$this->db->where('id',$id);
        $this->db->update($this->_table, $data);
    }

}
//end of class M_kontak.php