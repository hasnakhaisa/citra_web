<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Iklan extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Iklan_model'));
    }
       public function iklan_get(){
        $data = $this->Iklan_model->get_all();
        foreach ($data as $transaksi) {
       
            $result[] = array(
              'id_iklan' => $transaksi->id_iklan,
              
              'gambar' => $transaksi->gambar,
             
            );
          
        }

        if(!empty ($data)){
            $message = 
                 $result
            ;
        }else{
            $message = [
                'error' => true,
                'message' => 'Transaksi masih kosong !'
            ];
        }
        $this->response($message, REST_Controller::HTTP_CREATED);
    }
}