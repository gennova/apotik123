<?php
defined('BASEPATH') or exit ('No direct script allowed');

/**
 * 
 */
class M_transaksi extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function rules()
    {
        return [
            ['field' => 'kodetransaksinya',
            'label' => 'Kode Trx',
            'rules' => 'required'],
            
            ['field' => 'namapelanggan',
            'label' => 'Nama Pelanggan',
            'rules' => 'required']
        ];
    }

	function insert(){
		$this->load->model('M_invoice');
		$post = $this->input->post();
		$data = array('kodetransaksi' => $post['kodetransaksinya'],
  							'pelanggan' => $post['namapelanggan'],
  							'tipedo' =>  $post['tipedo'],
  							'carabayar' => $post['carabayar'],
  							'keterangan' => $post['keterangan'],
  							'totalharga' => $post['totalbayarnonformat'],
                'idkasir' =>$post['idkasir']);
        $this->db->insert('transaksi', $data);
         $this->M_invoice->simpan_invoice($post['kodetransaksinya']);
	}
}