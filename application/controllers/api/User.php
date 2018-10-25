<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function login_post(){
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $user = $this->user_model->cek_login($username, md5($pass));
        if(!empty ($user)){
            $message = [
                'error' => false,
                'message' => 'Login Successefully !',
                'user' => $user
            ];
        }else{
            $message = [
                'error' => true,
                'message' => 'Login Failed !'
            ];
        }
        $this->response($message, REST_Controller::HTTP_CREATED);
    }

    public function register_post(){
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $phone = $this->input->post('phone');
        $input = array(
            'user_name' => $username,
            'user_email' => $email,
            'user_telephone' => $phone,
            'user_password' => md5($pass) );

        $mail = $this->user_model->cek_email($email);
        $name = $this->user_model->cek_user($username);

        if(empty ($mail) && empty($name)){

            $insert = $this->user_model->insert($input);
            $data = $this->user_model->get_by_id($insert);

            if (!empty($data)) {
                $message = [
                    'error' => false,
                    'message' => 'Register successefully !',
                    'user' => $data
                ];
            }else{
                $message = [
                    'error' => true,
                    'message' => 'Sorry, Register failed !',
                    'user' => $data
                ];
            }

        }else{
            if ($this->user_model->cek_email($email)) {
                $message = [
                    'error' => true,
                    'message' => 'Sorry, Email already exist !'
                ];
            }else{
                $message = [
                    'error' => true,
                    'message' => 'Sorry, Username already exist !'
                ];
            }
        }
        $this->response($message, REST_Controller::HTTP_CREATED);
    }

    public function update_post(){
        $id = $this->input->post('user_ID');
        $username = $this->input->post('username');
        $email    = $this->input->post('email');
        $pass     = $this->input->post('password');
        $fullname = $this->input->post('fullname');
        $address  = $this->input->post('address');
        $telephone  = $this->input->post('telephone');
        $input = array(
            'user_ID' => $id,
            'user_name' => $username,
            'user_email' => $email,
          
            'user_fullname' => $fullname,
            'user_address' => $address,
            'user_telephone' => $telephone
          );

        $this->user_model->update($id, $input);
        $data = $this->user_model->get_by_id($id);
        if (!empty($data)) {
            $message = [
                'error' => false,
                'message' => 'Udate data successefully !',
                'user' => $data
            ];
        }else{
            $message = [
                'error' => true,
                'message' => 'Sorry, update data failed !'
            ];
        }
        $this->response($message, REST_Controller::HTTP_CREATED);
    }

}
