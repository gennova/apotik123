<?php
defined('BASEPATH') or exit ('No direct script allowed');

class M_katpembeli extends CI_Model{
	function kat_pembeli_list(){
		$hasil=$this->db->get('kategoripembeli');
		return $hasil->result();
	}


	function save(){
		$data = array(				
				'jeniskontak' 			=> $this->input->post('jeniskontak'), 
				'marginresep' 			=> $this->input->post('marginresep'), 
				'marginnonresep' 		=> $this->input->post('marginnonresep'),				
				'jenispembayaran' 		=> $this->input->post('jenisbayar'),
				'status' 				=> $this->input->post('status') 
			);
		$result=$this->db->insert('kategoripembeli',$data);
		return $result;
	}

	function update(){
		$id=$this->input->post('id');
		$jeniskontak=$this->input->post('jeniskontak');
		$marginresep=$this->input->post('marginresep');
		$marginnonresep=$this->input->post('marginnonresep');
		$jenisbayar =$this->input->post('jenisbayar');
		$status =$this->input->post('status');

		$this->db->set('jeniskontak', $jeniskontak);		
		$this->db->set('marginresep', $marginresep);
		$this->db->set('marginnonresep', $marginnonresep);
		$this->db->set('jenispembayaran', $jenisbayar);
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$result=$this->db->update('kategoripembeli');
		return $result;	
	}
	function delete(){
		$id=$this->input->post('id');
		$this->db->where('id', $id);
		$result=$this->db->delete('kategoripembeli');
		return $result;
	}	
}