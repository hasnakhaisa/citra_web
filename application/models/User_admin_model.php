<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_admin_model extends CI_Model
{

    public $table = 'user_admin';
    public $id = 'admin_ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
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
        $this->db->like('admin_ID', $q);
	$this->db->or_like('admin_name', $q);
	$this->db->or_like('admin_password', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('admin_ID', $q);
	$this->db->or_like('admin_name', $q);
	$this->db->or_like('admin_password', $q);
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

    function login($data) {

        $condition = "admin_name =" . "'" . $data['admin_name'] . "' AND " . "admin_password =" . "'" . $data['admin_password'] . "'";
        $this->db->select('*');
        $this->db->from('user_admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function read_user_information($username) {

        $condition = "admin_name =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('user_admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}

/* End of file User_admin_model.php */
/* Location: ./application/models/User_admin_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-04 22:47:11 */
/* http://harviacode.com */