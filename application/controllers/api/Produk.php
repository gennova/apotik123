<?php
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';

    class Produk extends REST_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->model('M_produk', 'prd');
        }

        // Get Data
        public function index_get() {
            $id = $this->get('produk_id');
            // jika id tidak ada (tidak panggil) 
            if($id === null) {
                // maka panggil semua data
                $produk = $this->prd->getProduk();
                // tapi jika id di panggil maka hanya id tersebut yang akan muncul pada data tersebut
            } else {
                $produk = $this->prd->getProduk($id);
            }

            if($produk) {
                $this->response([
                    'status' => true,
                    'data' => $produk
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            
            }

        }

    }

?>