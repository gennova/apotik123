<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {    
    
    public function login($name, $password){
        $this->load->model('M_transaksi');
        $password = sha1($password);
        $this->db->where('username',$name);
        $this->db->where('password',$password);
        $query = $this->db->get('ajax_login_ci');
        //echo $query->num_rows();
        if($query->num_rows()==1){
            foreach ($query->result() as $row){
                $running_target = $this->M_transaksi->getRunningOrderUser($row->id);
                $data = array(
                            'iduser' => $row->id,
                            'username'=> $row->username,
                            'namauser'=> $row->nama,
                            'level' => $row->level,
                            'runningtarget' => $running_target['running'],
                            'targetpenjualan' => $row->targetpenjualan,
                            'logged_in'=>TRUE
                );
            }
            $this->session->set_userdata($data);
        return TRUE;
        }
        else{
        return FALSE;
      }    
    }
    
    public function isLoggedIn(){
            header("cache-Control: no-store, no-cache, must-revalidate");
            header("cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
            $is_logged_in = $this->session->userdata('logged_in');

            if(!isset($is_logged_in) || $is_logged_in!==TRUE)
            {
                redirect('/');
                exit;
            }
    }
    
}