<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eceran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('person_model','person');
		$this->load->model('M_hargaproduk','hproduk');
		$this->load->model("M_produk");
		$this->load->model('m_invoice');
		$this->load->helper('rupiah_helper');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function index()
	{	
		$x['invoice']=$this->m_invoice->get_no_invoice();
		$x['data']=$this->M_produk->get_produkall();
		$this->load->helper('url');
		$this->load->view('person_view',$x);
	} 

	public function ajax_list($trx)
	{
		$list = $this->person->get_datatables($trx);
		$data = array();
		//$no = $_POST['start'];
		foreach ($list as $person) {
		//	$no++;
			$row = array();
			$row[] = $person->namaproduk;
			$row[] = $person->stok;
			$row[] = $person->hargajual;
			$row[] = $person->qty;
			$row[] = $person->diskon;
			$row[] = $person->totalbayar;

			//add html for action
			$row[] = '<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						//"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all($trx),
						"total" => $this->person->sum_total($trx),
						"recordsFiltered" => $this->person->count_filtered($trx),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'transaksi' => $this->m_invoice->get_no_invoice(),
				'barcode' => $this->input->post('firstName'),
				'stok' => $this->input->post('middleName'),
				'hargajual' => $this->input->post('lastName'),
				'qty' => $this->input->post('gender'),
				'diskon' => $this->input->post('address'),
				'totalbayar' => $this->input->post('dob'),
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),
			);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('firstName') == '')
		{
			$data['inputerror'][] = 'firstName';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('middleName') == '')
		{
			$data['inputerror'][] = 'middleName';
			$data['error_string'][] = 'Middle name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('lastName') == '')
		{
			$data['inputerror'][] = 'lastName';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('dob') == '')
		{
			$data['inputerror'][] = 'dob';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('gender') == '')
		{
			$data['inputerror'][] = 'gender';
			$data['error_string'][] = 'Please select gender';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}