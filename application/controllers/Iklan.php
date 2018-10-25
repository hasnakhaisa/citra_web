<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Iklan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Iklan_model'));
        $this->load->library(array('form_validation', 'datatables', 'upload'));        
    }

    public function index()
    {   
        $this->load->view('iklan/iklan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        $row = $this->Iklan_model->json();
        $json_data = json_decode($row);
        $data = $json_data->data;

        $json = array();

        for ($i=0; $i < sizeof($data); $i++) { 
          
           
            $echo_img = '<img style="width: 600px" src="'.$data[$i]->gambar.'">';
            $json[] = array(
                        'id_iklan' => $data[$i]->id_iklan,
                       
                        'gambar' => $echo_img,
                       
                        'action' => $data[$i]->action,
                    ); 
        }
        echo json_encode(
                array(
                    'recordsTotal' => $json_data->recordsTotal,
                    'recordsFiltered' => $json_data->recordsFiltered,
                    'data' => $json
                    )
                );
    }

    public function read($id) 
    {
        $row = $this->Iklan_model->get_by_id($id);
       
        if ($row) {
            $data = array(
            'id_iklan' => $row->id_iklan,
            
            'gambar' => $row->gambar,
            
        );
            $this->load->view('iklan/iklan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('iklan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah Data',
            'action' => site_url('iklan/create_action'),
            'id_iklan' => set_value('id_iklan'),
            
            'gambar' => set_value('gambar'),
           

        );
        $this->load->view('iklan/iklan_form', $data);
    }
    
    /*public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'product_name' => $this->input->post('product_name',TRUE),
                'product_category' => $this->input->post('product_category',TRUE),
                'product_price' => $this->input->post('product_price',TRUE),
                'product_description' => $this->input->post('product_description',TRUE),
                'product_description' => $this->input->post('product_description',TRUE),
                'product_time_duration' => $this->input->post('product_time_duration',TRUE),
            );

            $this->Product_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan !');
            redirect(site_url('product'));
        }
    }*/
    
    public function update($id) 
    {
        
        $row = $this->Iklan_model->get_by_id($id);



        if ($row) {




            $data = array(
                'button' => 'Perbarui Data',
                'action' => site_url('iklan/update_action'),
                'id_iklan' => set_value('id_iklan', $row->id_iklan),
                
                'gambar' => set_value('gambar', $row->gambar),
                
            );
            $this->load->view('iklan/iklan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('iklan'));
        }
    }
    
    /*public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('product_ID', TRUE));
        } else {
            $data = array(
                'product_name' => $this->input->post('product_name',TRUE),
                'product_category' => $this->input->post('product_category',TRUE),
                'product_price' => $this->input->post('product_price',TRUE),
                'product_description' => $this->input->post('product_description',TRUE),
                'product_time_duration' => $this->input->post('product_time_duration',TRUE),
           );

            $this->Product_model->update($this->input->post('product_ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil diperbarui !');
            redirect(site_url('product'));
        }
    }*/
    
    public function delete($id) 
    {
        $row = $this->Iklan_model->get_by_id($id);

        if ($row) {
            $this->Iklan_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus !');
            redirect(site_url('iklan'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('iklan'));
        }
    }

    public function _rules() 
    {
       
        $this->form_validation->set_rules('gambar', 'gambar', 'required');
       

        $this->form_validation->set_rules('id_iklan', 'id_iklan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function create_action()
        {
         $filenames = $_FILES['gambar']['name'];
        $config['upload_path'] = './assets/uploads/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '100000'; //maksimum besar file 3M
        $config['remove_space'] = TRUE;
        $config['max_width']  = '100000'; //lebar maksimum 5000 px
        $config['max_height']  = '100000'; //tinggi maksimu 5000 px
        $config['file_name'] = $filenames; //nama yang terupload nantinya
        $filenames = str_replace(' ', '_', $filenames);
        $this->upload->initialize($config);    
             if($_FILES['gambar']['name'])
        {
            if ($this->upload->do_upload('gambar'))
            {
                $gbr = $this->upload->data();
                $data = array(
                    'gambar' => 'assets/uploads/' .$filenames,
                    
                );

                $this->Iklan_model->insert($data); //akses model untuk menyimpan ke database
                
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('iklan'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('iklan/create'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }

    public function update_action() 
    {
        $filenames = $_FILES['gambar']['name'];
        $config['upload_path'] = './assets/uploads/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '100000'; //maksimum besar file 3M
        $config['max_width']  = '100000'; //lebar maksimum 5000 px
        $config['max_height']  = '100000'; //tinggi maksimu 5000 px
        $config['remove_space'] = TRUE;
        $config['file_name'] = $filenames; //nama yang terupload nantinya
        $filenames = str_replace(' ', '_', $filenames);
        $this->upload->initialize($config);

        $this->_rules();

        if($_FILES['gambar']['name'])
        {
            
            if ($this->upload->do_upload('gambar'))
            {
                
                $gbr = $this->upload->data();
                $data = array(
                    'id_iklan' => $this->input->post('id_iklan',TRUE),
                    'gambar' => 'assets/uploads/' .$filenames,
                   
                );

                $this->Iklan_model->update($this->input->post('id_iklan', TRUE), $data);
                
                    //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
               
                redirect('iklan'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                //redirect('iklan/create'); //jika gagal maka akan ditampilkan form upload
                echo "gagal bro";
            }
            
        }else{
            $this->update($this->input->post('id_iklan', TRUE));
        }
    }









}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-04 22:47:29 */
/* http://harviacode.com */


