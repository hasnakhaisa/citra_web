<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
	      $this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('user/user_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->User_model->json();
    }

    public function read($id)
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'user_ID' => $row->user_ID,
        		'user_name' => $row->user_name,
        		'user_password' => $row->user_password,
        		'user_email' => $row->user_email,
        		'user_telephone' => $row->user_telephone,
        		'user_address' => $row->user_address,
	        );
            $this->load->view('user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('user'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah Data',
            'action' => site_url('user/create_action'),
      	    'user_ID' => set_value('user_ID'),
      	    'user_name' => set_value('user_name'),
      	    'user_password' => set_value('user_password'),
      	    'user_email' => set_value('user_email'),
      	    'user_telephone' => set_value('user_telephone'),
      	    'user_address' => set_value('user_address'),
      	);
        $this->load->view('user/user_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'user_name' => $this->input->post('user_name',TRUE),
          		'user_password' => md5($this->input->post('user_password',TRUE)),
          		'user_email' => $this->input->post('user_email',TRUE),
          		'user_telephone' => $this->input->post('user_telephone',TRUE),
          		'user_address' => $this->input->post('user_address',TRUE),
      	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan !');
            redirect(site_url('user'));
        }
    }

    public function update($id)
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbarui Data',
                'action' => site_url('user/update_action'),
            		'user_ID' => set_value('user_ID', $row->user_ID),
            		'user_name' => set_value('user_name', $row->user_name),
            		'user_password' => set_value('user_password', $row->user_password),
            		'user_email' => set_value('user_email', $row->user_email),
            		'user_telephone' => set_value('user_telephone', $row->user_telephone),
            		'user_address' => set_value('user_address', $row->user_address),
    	       );
            $this->load->view('user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('user'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('user_ID', TRUE));
        } else {
            $data = array(
        		'user_name' => $this->input->post('user_name',TRUE),
        		'user_password' => md5($this->input->post('user_password',TRUE)),
        		'user_email' => $this->input->post('user_email',TRUE),
        		'user_telephone' => $this->input->post('user_telephone',TRUE),
        		'user_address' => $this->input->post('user_address',TRUE),
	       );

            $this->User_model->update($this->input->post('user_ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil diperbarui !');
            redirect(site_url('user'));
        }
    }

    public function delete($id)
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus !');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('user'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('user_name', 'user name', 'trim|required');
    	$this->form_validation->set_rules('user_password', 'user password', 'trim|required');
    	$this->form_validation->set_rules('user_email', 'user email', 'trim|required');
    	$this->form_validation->set_rules('user_telephone', 'user telephone', 'trim|required');
    	$this->form_validation->set_rules('user_address', 'user address', 'trim|required');

    	$this->form_validation->set_rules('user_ID', 'user_ID', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-04 22:47:39 */
/* http://harviacode.com */
