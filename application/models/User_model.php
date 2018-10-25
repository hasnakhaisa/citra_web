<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'user';
    public $id = 'user_ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('user_ID,user_name,user_password,user_email,user_telephone,user_address');
        $this->datatables->from('user');
        //add this line for join
        //$this->datatables->join('table2', 'user.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('user/read/$1'),'
            <button type="button" class="btn btn-primary">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
            </button>')."".anchor(site_url('user/update/$1'),'
            <button type="button" class="btn btn-success">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </button>')."".anchor(site_url('user/delete/$1'),'
            <button type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>','onclick="javasciprt: return confirm(\'Anda yakin ingin menghapus data ini ?\')"'), 'user_ID');
        return $this->datatables->generate();
    }

    function cek_email($email){
        $this->db->where('user_email', $email);
        return $this->db->get($this->table)->row();
    }

    function cek_user($user){
        $this->db->where('user_name', $user);
        return $this->db->get($this->table)->row();
    }

    function cek_login($name, $pass){
        $this->db->where('user_name', $name);
        $this->db->where('user_password', $pass);
        return $this->db->get($this->table)->row();
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
        $this->db->like('user_ID', $q);
      	$this->db->or_like('user_name', $q);
        $this->db->or_like('user_fullname', $q);
      	$this->db->or_like('user_password', $q);
      	$this->db->or_like('user_email', $q);
      	$this->db->or_like('user_telephone', $q);
      	$this->db->or_like('user_address', $q);
      	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('user_ID', $q);
      	$this->db->or_like('user_name', $q);
        $this->db->or_like('user_fullname', $q);
      	$this->db->or_like('user_password', $q);
      	$this->db->or_like('user_email', $q);
      	$this->db->or_like('user_telephone', $q);
      	$this->db->or_like('user_address', $q);
      	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();

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

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-04 22:47:39 */
/* http://harviacode.com */