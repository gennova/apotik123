<?php
defined('BASEPATH') or exit('No Direct script allowed');
class M_kategori extends CI_Model{
 
    function getAllKategori(){
        return $this->db->get('kategori')->result();
    }
     
     function getAllSubKategori(){
        return $this->db->get('subkategori')->result();
    }
}