<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Category extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('category_model'));
    }


    public function list_get(){
        $category = $this->category_model->get_all();
        foreach ($category as $categories) {
            $data[] = array(
                'category_ID' => $categories->category_ID,
                'category_name' => $categories->category_name,
                'category_image' => $categories->category_image,
            );
        }
        if(!empty ($category)){
            $message = [
                'error' => false,
                'message' => 'Data category',
                'product_category' => $category
            ];
        }else{
            $message = [
                'error' => true,
                'message' => 'Category masih kosong !'
            ];
        }
        $this->response($message, REST_Controller::HTTP_CREATED);
    }

}
