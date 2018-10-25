<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Cart extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('category_model', 'product_model', 'transaction_model', 'transaction_detail_model'));
    }

    public function upload_post(){
        $transaction_id = $this->input->post('transaction_id');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!isset($transaction_id) || ! $this->upload->do_upload('file'))
        {
                $error = array('error' => $this->upload->display_errors());

                $message = [
                  'error' => true,
                  'message' => $error['error'],
                ];

                $this->response($message, REST_Controller::HTTP_CREATED);
        }
        else
        {
                $success = array('upload_data' => $this->upload->data());

                $data = array(
                  'transaction_image' => 'uploads' . '/' . $success['upload_data']['file_name']
                );

                $message = [
                  'error' => false,
                  'message' => 'Sukses mengupload !',
                  'image' => 'uploads' . '/' . $success['upload_data']['file_name']
                ];

                $result = $this->transaction_model->update($transaction_id,$data);


                $this->response($message, REST_Controller::HTTP_CREATED);
        }
    }

    public function add_post(){
        $status = $this->input->post('transaction_status');
        $time = $this->input->post('transaction_time');
        $userid = $this->input->post('user_ID');

        $product_id = $this->input->post('product_id');
        $qty = $this->input->post('product_quantity');
        $price = $this->input->post('price');
        $total_payment = $this->input->post('total_payment');

        $input = array(
                'transaction_status' => $status,
                'transaction_time' => $time,
                'user_ID' => $userid,
                'destination_address' => "",
        );
        
        $transaction_id = $this->transaction_model->insert($input);

        $input_detail = array(
                'transaction_ID' => $transaction_id,
                'product_ID' => $product_id,
                'quantity' => $qty,
                'price' => $price,
                'total_payment' => $total_payment
        );

        $this->transaction_detail_model->insert($input_detail);

        $data = $this->transaction_model->get_by_id($transaction_id);
        if(!empty ($data)){
            $message = [
                'error' => false,
                'message' => 'Data berhasil ditambahkan ke keranjang',
                'cart' => $data
            ];
        }else{
            $message = [
                'error' => true,
                'message' => 'Transaksi gagal ditambahkan !'
            ];
        }
        $this->response($message, REST_Controller::HTTP_CREATED);
    }


    public function list_get(){
        $data = $this->transaction_detail_model->get_all();
        $getuserid = $this->input->get('userid');

        foreach ($data as $transaksi) {
          $transaction = $this->transaction_model->get_by_id($transaksi->transaction_ID);
          $products = $this->product_model->get_by_id($transaksi->product_ID);
          $userid = $transaction->user_ID;
          if ($getuserid == $userid){
            $result[] = array(
              'detail_ID' => $transaksi->detail_ID,
              'transaction_ID' => $transaction,
              'product_ID' => $products,
              'quantity' => $transaksi->quantity,
              'price' => $transaksi->price,
              'total_payment' => $transaksi->total_payment
            );
          }
        }

        if(!empty ($data)){
            $message = [
                'error' => false,
                'message' => 'Data transaksi',
                'cart' => $result
            ];
        }else{
            $message = [
                'error' => true,
                'message' => 'Transaksi masih kosong !'
            ];
        }
        $this->response($message, REST_Controller::HTTP_CREATED);
    }

    public function update_post(){
        $transactionId = $this->input->post('transaction_id');
        $alamat = $this->input->post('alamat');
        $info = $this->input->post('info');

        if ($transactionId!= null ){
          $data = array(
                  'destination_address' => $alamat,
                  'information' => $info,
                  'transaction_status' => "Barang Diproses",
          );
          $this->transaction_model->update($transactionId, $data);
        }


        if(!empty ($data)){
            $message = [
                'error' => false,
                'message' => 'Data transaksi diupdate'
            ];
        }else{
            $message = [
                'error' => true,
                'message' => 'Update gagal'
            ];
        }
        $this->response($message, REST_Controller::HTTP_CREATED);
    }

    public function status_get($param){
      $data = $this->transaction_detail_model->get_by_status($param);

      if(!empty ($data)){
          $message = [
              'error' => false,
              'message' => 'Data transaksi',
              'cart' => $result
          ];
      }else{
          $message = [
              'error' => true,
              'message' => 'Transaksi masih kosong !'
          ];
      }
      $this->response($message, REST_Controller::HTTP_CREATED);
    }

    public function delete_post()
    {
        $id = (int) $this->delete('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }
}


// $data = $this->transaction_detail_model->get_all();
//         $getuserid = $this->input->get('userid');

//         foreach ($data as $transaksi) {
//           $transaction = $this->transaction_model->get_by_id($transaksi->transaction_ID);
//           $products = $this->product_model->get_by_id($transaksi->product_ID);

//           $result[] = array(
//             'detail_ID' => $transaksi->detail_ID,
//             'transaction_ID' => $this->transaction_model->get_by_id($transaksi->transaction_ID),
//             'product_ID' => array(
//                         'product_ID' => $products->product_ID,
//                         'product_name' => $products->product_name,
//                         'product_category' => $this->category_model->get_by_id($products->product_category),
//                         'product_price' => $products->product_price,
//                         'product_description' => $products->product_description,
//                         'product_image' => $products->product_image,
//                         'product_time_duration' => $products->product_time_duration,
//                         'product_count_view' => $products->product_count_view,
//                         'product_dimensions' => $products->product_dimensions,
//                         'product_weight' => $products->product_weight,
//                     ),
//             'quantity' => $transaksi->quantity,
//             'price' => $transaksi->price,
//             'total_payment' => $transaksi->total_payment
//           );
//         }


//Pasrah

// public function list_get(){
//         $data = $this->transaction_detail_model->get_all();
//         $getuserid = $this->input->get('userid');

//         foreach ($data as $transaksi) {
//           $transaction = $this->transaction_model->get_by_id($transaksi->transaction_ID);
//           $products = $this->product_model->get_by_id($transaksi->product_ID);

          

//           $result[] = array(
//             'detail_ID' => $transaksi->detail_ID,
//             'transaction_ID' => $this->transaction_model->get_by_id($transaksi->transaction_ID),
//             'product_ID' => $products,
//             'quantity' => $transaksi->quantity,
//             'price' => $transaksi->price,
//             'total_payment' => $transaksi->total_payment
//           );
//         }