<?php
class M_apoteker extends CI_Model{

	function employeeList(){
		$hasil=$this->db->get('apoteker');
		return $hasil->result();
	}


	function saveEmp(){
		$data = array(				
				'nojasa' 			=> $this->input->post('nojasa'), 
				'namajasa' 			=> $this->input->post('namajasa'), 
				'nominal' 			=> $this->input->post('nominal'), 
				'status' 			=> $this->input->post('status'), 
				'keterangan' 		=> $this->input->post('keterangan'), 
			);
		$result=$this->db->insert('apoteker',$data);
		return $result;
	}

	function updateEmp(){
		$id=$this->input->post('id');
		$nojasa=$this->input->post('nojasa');
		$namajasa=$this->input->post('namajasa');
		$nominal=$this->input->post('nominal');
		$status=$this->input->post('status');
		$keterangan=$this->input->post('keterangan');
		$this->db->set('nojasa', $nojasa);
		$this->db->set('namajasa', $namajasa);
		$this->db->set('nominal', $nominal);
		$this->db->set('status', $status);
		$this->db->set('keterangan', $keterangan);
		$this->db->where('id', $id);
		$result=$this->db->update('apoteker');
		return $result;	
	}
	function deleteEmp(){
		$id=$this->input->post('id');
		$this->db->where('id', $id);
		$result=$this->db->delete('apoteker');
		return $result;
	}	
}