<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user_admin/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user_admin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user_admin/index.html';
            $config['first_url'] = base_url() . 'user_admin/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_admin_model->total_rows($q);
        $user_admin = $this->User_admin_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_admin_data' => $user_admin,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('user_admin/user_admin_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_admin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'admin_ID' => $row->admin_ID,
		'admin_name' => $row->admin_name,
		'admin_password' => $row->admin_password,
	    );
            $this->load->view('user_admin/user_admin_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('user_admin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah Data',
            'action' => site_url('user_admin/create_action'),
	    'admin_ID' => set_value('admin_ID'),
	    'admin_name' => set_value('admin_name'),
	    'admin_password' => set_value('admin_password'),
	);
        $this->load->view('user_admin/user_admin_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'admin_name' => $this->input->post('admin_name',TRUE),
		'admin_password' => $this->input->post('admin_password',TRUE),
	    );

            $this->User_admin_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan !');
            redirect(site_url('user_admin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_admin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbarui Data',
                'action' => site_url('user_admin/update_action'),
		'admin_ID' => set_value('admin_ID', $row->admin_ID),
		'admin_name' => set_value('admin_name', $row->admin_name),
		'admin_password' => set_value('admin_password', $row->admin_password),
	    );
            $this->load->view('user_admin/user_admin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('user_admin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('admin_ID', TRUE));
        } else {
            $data = array(
		'admin_name' => $this->input->post('admin_name',TRUE),
		'admin_password' => $this->input->post('admin_password',TRUE),
	    );

            $this->User_admin_model->update($this->input->post('admin_ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil diperbarui !');
            redirect(site_url('user_admin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_admin_model->get_by_id($id);

        if ($row) {
            $this->User_admin_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus !');
            redirect(site_url('user_admin'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('user_admin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('admin_name', 'admin name', 'trim|required');
	$this->form_validation->set_rules('admin_password', 'admin password', 'trim|required');

	$this->form_validation->set_rules('admin_ID', 'admin_ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User_admin.php */
/* Location: ./application/controllers/User_admin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-04 22:47:11 */
/* http://harviacode.com */