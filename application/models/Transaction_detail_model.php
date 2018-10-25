<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaction_detail_model extends CI_Model
{

    public $table = 'transaction_detail';
    public $id = 'detail_ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('detail_ID, product_ID,transaction_ID, quantity,price,total_payment,');
        $this->datatables->from('transaction_detail');


        //add this line for join
        //$this->datatables->join('table2', 'transaction_detail.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('transaction_detail/read/$1'),'
            <button type="button" class="btn btn-primary">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
            </button>')."".anchor(site_url('transaction_detail/update/$1'),'
            <button type="button" class="btn btn-success">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </button>')."".anchor(site_url('transaction_detail/delete/$1'),'
            <button type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>','onclick="javasciprt: return confirm(\'Anda yakin ingin menghapus data ini ?\')"'), 'detail_ID');
        return $this->datatables->generate();
    }

    

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('detail_ID', $q);
	$this->db->or_like('transaction_ID', $q);
	$this->db->or_like('product_ID', $q);
	$this->db->or_like('quantity', $q);
	$this->db->or_like('price', $q);
	$this->db->or_like('total_payment', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('detail_ID', $q);
	$this->db->or_like('transaction_ID', $q);
	$this->db->or_like('product_ID', $q);
	$this->db->or_like('quantity', $q);
	$this->db->or_like('price', $q);
	$this->db->or_like('total_payment', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Transaction_detail_model.php */
/* Location: ./application/models/Transaction_detail_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-30 20:47:17 */
/* http://harviacode.com */
