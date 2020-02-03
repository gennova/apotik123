<?php
defined('BASEPATH') or exit('No direct script allowed');

class M_jeniskontak extends CI_Model{

	function list(){
		$hasil = $this->db->get('jeniskontak');
		return $hasil->result();
	}

	function saveJenis(){
		$data = array('jeniskontak'=>$this->input->post('jeniskontak'),
			'marginresep' => $this->input->post('marginresep'),
			'marginnonresep' => $this->input->post('marginnonresep'),
			'jenispembayaran' => $this->input->post('jenisbayar'),
			'status' => $this->input->post('statusjenis'));
		$result = $this->db->insert('jeniskontak',$data);
		return $result;
	}

	function updateJenis(){
		$ID = $this->input->post('id');
		$JENISKONTAK = $this->input->post('jeniskontak');
		$MARGINRESEP =$this->input->post('marginresep');
		$MARGINNONRESEP =$this->input->post('marginnonresep');
		$JENISPEMBAYARAN =$this->input->post('jenisbayar');
		$STATUS = $this->input->post('statusjenis');
		$this->db->set('jeniskontak',$JENISKONTAK);
		$this->db->set('marginresep',$MARGINRESEP);
		$this->db->set('marginnonresep',$MARGINNONRESEP);
		$this->db->set('jenispembayaran',$JENISPEMBAYARAN);
		$this->db->set('status',$STATUS);
		$this->db->where('id',$ID);
		$result = $this->db->update('jeniskontak');
		return $result;

	}

	function deleteJenis(){
		$ID = $this->input->post('id');
		$this->db->where('id',$ID);
		$result = $this->db->delete('jeniskontak');
		return $result;
	}
}