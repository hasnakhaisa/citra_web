<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Product extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('category_model', 'product_model'));
    }

    public function category_get($category){
        $product = $this->product_model->get_by_category($category);

        foreach ($product as $products) {
            $data[] = array(
                        'product_ID' => $products->product_ID,
                        'product_name' => $products->product_name,
                        'product_category' => $this->category_model->get_by_id($products->product_category),
                        'product_price' => $products->product_price,
                        'product_description' => $products->product_description,
                        'product_image' => $products->product_image,
                        'product_time_duration' => $products->product_time_duration,
                        'product_count_view' => $products->product_count_view,
                        'product_dimensions' => $products->product_dimensions,
                        'product_weight' => $products->product_weight,
                    );
        }

        if(!empty ($product)){
            $message = [
                'error' => false,
                'message' => 'Data produk per category',
                'products' => $data
            ];
        }else{
            $message = [
                'error' => true,
                'message' => 'Produk masih kosong !'
            ];
        }
        $this->response($message, REST_Controller::HTTP_CREATED);
    }

    public function detail_get($id){
        $product = $this->product_model->get_by_id($id);
        $count_view = $product->product_count_view + 1;

        $data = array(
                'product_count_view' => $count_view,
            );

        $update = $this->product_model->update_view($product->product_ID, $data);
        $products = $this->product_model->get_by_id($id);

        if(!empty ($products)){
            $message = [
                'error' => false,
                'message' => 'Data produk per id',
                'product' => array(
                        'product_ID' => $products->product_ID,
                        'product_name' => $products->product_name,
                        'product_category' => $this->category_model->get_by_id($products->product_category),
                        'product_price' => $products->product_price,
                        'product_description' => $products->product_description,
                        'product_image' => $products->product_image,
                        'product_time_duration' => $products->product_time_duration,
                        'product_count_view' => $products->product_count_view,
                        'product_dimensions' => $products->product_dimensions,
                        'product_weight' => $products->product_weight,
                    )
            ];
        }else{
            $message = [
                'error' => true,
                'message' => 'Produk masih kosong !'
            ];
        }
        $this->response($message, REST_Controller::HTTP_CREATED);
    }

    public function popular_get(){
        $product = $this->product_model->get_by_view();

        foreach ($product as $products) {
            $data[] = array(
                        'product_ID' => $products->product_ID,
                        'product_name' => $products->product_name,
                        'product_category' => $this->category_model->get_by_id($products->product_category),
                        'product_price' => $products->product_price,
                        'product_description' => $products->product_description,
                        'product_image' => $products->product_image,
                        'product_time_duration' => $products->product_time_duration,
                        'product_count_view' => $products->product_count_view,
                        'product_dimensions' => $products->product_dimensions,
                        'product_weight' => $products->product_weight,
                    );
        }

        if(!empty ($product)){
            $message = [
                'error' => false,
                'message' => 'Data produk popular',
                'products' => $data
            ];
        }else{
            $message = [
                'error' => true,
                'message' => 'Produk masih kosong !'
            ];
        }
        $this->response($message, REST_Controller::HTTP_CREATED);
    }

    public function data($product){


    }

}
