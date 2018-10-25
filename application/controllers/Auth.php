<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->helper(array('form', 'security'));
		$this->load->library(array('form_validation', 'session'));

		$this->load->model(array('user_admin_model','product_model','transaction_model','user_model','category_model'));

	}

	public function index(){
		$this->load->view('login');
	}

	public function login() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('dashboard');
			}else{
				$this->load->view('login');
			}
		} else {
			$data = array(
				'admin_name' => $this->input->post('username'),
				'admin_password' => $this->input->post('password')
			);
			$result = $this->user_admin_model->login($data);
			
			if ($result == TRUE) {
				$username = $this->input->post('username');
				$result = $this->user_admin_model->read_user_information($username);
				
				if ($result != false) {
					$session_data = array(
						'admin_name' => $result[0]->admin_name,
						'product' => $this->product_model->total_rows(),
						'category' => $this->category_model->total_rows(),
						'user' => $this->user_model->total_rows(),
						'transaction' => $this->transaction_model->total_rows(),

					);
					
					$this->session->set_userdata('logged_in', $session_data);
					redirect(site_url('dashboard'));
					//~ var_dump($this->session->userdata());
				}
			} else {
				$data = array(
					'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login', $data);
			}
		}
	}

	public function logout() {

		$sess_array = array(
			'admin_name' => ''
		);

		$this->session->unset_userdata('logged_in', $sess_array);

		$data['message_display'] = 'Successfully Logout';

		$this->load->view('login', $data);

	}
}
