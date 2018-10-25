<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('transaction/transaction_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Transaction_model->json();
    }

    public function read($id) 
    {
        $row = $this->Transaction_model->get_by_id($id);
        if ($row) {
            $data = array(
		'transaction_ID' => $row->transaction_ID,
		'transaction_status' => $row->transaction_status,
		'transaction_time' => $row->transaction_time,
		'user_ID' => $row->user_ID,
		'destination_address' => $row->destination_address,
		'information' => $row->information,
      
	    );
            $this->load->view('transaction/transaction_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('transaction'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah Data',
            'action' => site_url('transaction/create_action'),
	    'transaction_ID' => set_value('transaction_ID'),
	      'transaction_status' => array(
                    'list' => array('Belum isi detail','Tunggu Pembayaran','Konfirmasi Pembayaran','Barang Diproses','Barang diKirim','Barang diTerima'),
                    'checked' => '0'
                ),
	    'transaction_time' => set_value('transaction_time'),
	     'user_ID' => array(
                    'list' => $this->Transaction_model->get_all(),
                    'checked' => '0'
                ),
	    'destination_address' => set_value('destination_address'),
	    'information' => set_value('information'),
        
	);
        $this->load->view('transaction/transaction_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'transaction_status' => $this->input->post('transaction_status',TRUE),
		'transaction_time' => $this->input->post('transaction_time',TRUE),
		'user_ID' => $this->input->post('user_ID',TRUE),
		'destination_address' => $this->input->post('destination_address',TRUE),
		'information' => $this->input->post('information',TRUE),
       
	    );

            $this->Transaction_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan !');
            redirect(site_url('transaction'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaction_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbarui Data',
                'action' => site_url('transaction/update_action'),
		'transaction_ID' => set_value('transaction_ID', $row->transaction_ID),
		'transaction_status' => array(
                        'list' => array('Belum isi detail','Tunggu Pembayaran','Konfirmasi Pembayaran','Barang Diproses','Barang diKirim','Barang diTerima'),
                        'checked' => $row->transaction_status
                    ),
		'transaction_time' => set_value('transaction_time', $row->transaction_time),
			'user_ID' => array(
                        'list' => $this->Transaction_model->get_all(),
                        'checked' => $row->user_ID,
                    ),
		'destination_address' => set_value('destination_address', $row->destination_address),
		'information' => set_value('information', $row->information),
        
	    );
            $this->load->view('transaction/transaction_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('transaction'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('transaction_ID', TRUE));
        } else {
            $data = array(
		'transaction_status' => $this->input->post('transaction_status',TRUE),
		'transaction_time' => $this->input->post('transaction_time',TRUE),
		'user_ID' => $this->input->post('user_ID',TRUE),
		'destination_address' => $this->input->post('destination_address',TRUE),
		'information' => $this->input->post('information',TRUE),
       
	    );

            $this->Transaction_model->update($this->input->post('transaction_ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil diperbarui !');
            redirect(site_url('transaction'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaction_model->get_by_id($id);

        if ($row) {
            $this->Transaction_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus !');
            redirect(site_url('transaction'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('transaction'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('transaction_status', 'transaction status', 'trim|required');
	$this->form_validation->set_rules('transaction_time', 'transaction time', 'trim|required');
	$this->form_validation->set_rules('user_ID', 'user id', 'trim|required');
	$this->form_validation->set_rules('destination_address', 'destination address', 'trim|required');
	$this->form_validation->set_rules('information', 'information', 'trim|required');
   
	$this->form_validation->set_rules('transaction_ID', 'transaction_ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-04 22:47:36 */
/* http://harviacode.com */