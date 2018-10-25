<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaction_detail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_detail_model');
        $this->load->library('form_validation');
	      $this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('transaction_detail/transaction_detail_list');
    }

    public function json() {
        header('Content-Type: application/json');
        $object = $this->Transaction_detail_model->json();

        $data = json_decode($object);
        $total = $data->recordsTotal;
        $filter = $data->recordsFiltered;
        $array = $data->data;

        foreach ($array as $item) {
       

            $json[] = array(
                    'detail_ID' => $item->detail_ID,
                     'transaction_ID' => $item->transaction_ID,
                    'product_ID' => $item->product_ID,
                    
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total_payment' => $item->total_payment,
                    
                    'action' => $item->action
                );
        }

        echo json_encode(array(
                'recordsTotal' => $total,
                'recordsFiltered' => $filter,
                'data' => $json
            ));
    }

    public function read($id)
    {
        $row = $this->Transaction_detail_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'detail_ID' => $row->detail_ID,
        		'transaction_ID' => $row->transaction_ID,
        		'product_ID' => $row->product_ID,
        		'quantity' => $row->quantity,
        		'price' => $row->price,
        		'total_payment' => $row->total_payment,
	       );
            $this->load->view('transaction_detail/transaction_detail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('transaction_detail'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah Data',
            'action' => site_url('transaction_detail/create_action'),
	    'detail_ID' => set_value('detail_ID'),
	    'transaction_ID' => set_value('transaction_ID'),
	    'product_ID' => set_value('product_ID'),
	    'quantity' => set_value('quantity'),
	    'price' => set_value('price'),
	    'total_payment' => set_value('total_payment'),
	);
        $this->load->view('transaction_detail/transaction_detail_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'transaction_ID' => $this->input->post('transaction_ID',TRUE),
		'product_ID' => $this->input->post('product_ID',TRUE),
		'quantity' => $this->input->post('quantity',TRUE),
		'price' => $this->input->post('price',TRUE),
		'total_payment' => $this->input->post('total_payment',TRUE),
	    );

            $this->Transaction_detail_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan !');
            redirect(site_url('transaction_detail'));
        }
    }

    public function update($id)
    {
        $row = $this->Transaction_detail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbarui Data',
                'action' => site_url('transaction_detail/update_action'),
		'detail_ID' => set_value('detail_ID', $row->detail_ID),
		'transaction_ID' => set_value('transaction_ID', $row->transaction_ID),
		'product_ID' => set_value('product_ID', $row->product_ID),
		'quantity' => set_value('quantity', $row->quantity),
		'price' => set_value('price', $row->price),
		'total_payment' => set_value('total_payment', $row->total_payment),
	    );
            $this->load->view('transaction_detail/transaction_detail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('transaction_detail'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('detail_ID', TRUE));
        } else {
            $data = array(
		'transaction_ID' => $this->input->post('transaction_ID',TRUE),
		'product_ID' => $this->input->post('product_ID',TRUE),
		'quantity' => $this->input->post('quantity',TRUE),
		'price' => $this->input->post('price',TRUE),
		'total_payment' => $this->input->post('total_payment',TRUE),
	    );

            $this->Transaction_detail_model->update($this->input->post('detail_ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil diperbarui !');
            redirect(site_url('transaction_detail'));
        }
    }

    public function delete($id)
    {
        $row = $this->Transaction_detail_model->get_by_id($id);

        if ($row) {
            $this->Transaction_detail_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus !');
            redirect(site_url('transaction_detail'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('transaction_detail'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('transaction_ID', 'transaction id', 'trim|required');
	$this->form_validation->set_rules('product_ID', 'product id', 'trim|required');
	$this->form_validation->set_rules('quantity', 'quantity', 'trim|required');
	$this->form_validation->set_rules('price', 'price', 'trim|required');
	$this->form_validation->set_rules('total_payment', 'total payment', 'trim|required');

	$this->form_validation->set_rules('detail_ID', 'detail_ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaction_detail.php */
/* Location: ./application/controllers/Transaction_detail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-30 20:47:17 */
/* http://harviacode.com */
