<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Category_model'));
        $this->load->library(array('form_validation', 'datatables', 'upload'));        
    }

    public function index()
    {   
        $this->load->view('category/category_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        $row = $this->Category_model->json();
        $json_data = json_decode($row);
        $data = $json_data->data;

        $json = array();

        for ($i=0; $i < sizeof($data); $i++) { 
           
            $echo_img = '<img style="width: 150px"  src="'.$data[$i]->category_image.'">';
            $json[] = array(
                        'category_ID' => $data[$i]->category_ID,
                        'category_name' => $data[$i]->category_name,
                        'category_image' => $echo_img,
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
        $row = $this->Category_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'category_ID' => $row->category_ID,
    		'category_name' => $row->category_name,
            'category_image' => $row->category_image,
	    );
            $this->load->view('category/category_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('category'));
        }
    }

    public function create() 
    {

        $data = array(
            'button' => 'Tambah Data',
            'action' => site_url('category/create_action'),
    	    'category_ID' => set_value('category_ID'),
    	      'category_name' => set_value('category_name'),
            'category_image' => set_value('category_image'),
    	  

    	);
        $this->load->view('category/category_form', $data);
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
        $row = $this->Category_model->get_by_id($id);
       
        if ($row) {
           
            $data = array(
                'button' => 'Perbarui Data',
                'action' => site_url('category/update_action'),
        		'category_ID' => set_value('category_ID', $row->category_ID),
        		'category_name' => set_value('category_name', $row->category_name),
        	
                'category_image' => set_value('category_image', $row->category_image),
        	

    	    );
            $this->load->view('category/category_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('category'));
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
        $row = $this->Category_model->get_by_id($id);

        if ($row) {
            $this->Category_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus !');
            redirect(site_url('category'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('category'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('category_name', 'category name', 'trim|required');
    
        $this->form_validation->set_rules('category_image', 'category image','required');
    


    	$this->form_validation->set_rules('category_ID', 'category_ID', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function create_action()
    {

//        $filename = $_FILES['category_image']['name'];
        $config['upload_path'] = './assets/uploads/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '9000'; //maksimum besar file 3M
        $config['remove_space'] = TRUE;
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $this->upload->initialize($config);
        log_message('debug',print_r($_FILES,TRUE));

        if($_FILES['category_image']['name'])
        {
            $filename = $_FILES['category_image']['name'];
            $config['file_name'] = $filename; //nama yang terupload nantinya
            $filename = str_replace(' ', '_', $filename);

            if ($this->upload->do_upload('category_image'))
            {
               
                $data = array(
                    'category_image' => 'assets/uploads/' .$filename,
                    'category_name' => $this->input->post('category_name',TRUE),
                );

                $this->Category_model->insert($data); //akses model untuk menyimpan ke database
                
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('caegory'); //jika berhasil maka akan ditampilkan view upload
            }
            else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('category/create'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }

    public function update_action() 
    {
//        $filename = $_FILES['category_image']['name'];
        $config['upload_path'] = './assets/uploads/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['remove_space'] = TRUE;

        $this->upload->initialize($config);

        $this->_rules();

        if($_FILES['category_image']['name'])
        {
            $filename = $_FILES['category_image']['name'];
            $config['file_name'] = $filename; //nama yang terupload nantinya
            $filename = str_replace(' ', '_', $filename);

            if ($this->upload->do_upload('category_image'))
            {
                
                $gbr = $this->upload->data();
                $data = array(
                    'category_image' => 'assets/uploads/' .$filename,
                    'category_name' => $this->input->post('category_name',TRUE),
                   
                );

                $this->Category_model->update($this->input->post('category_ID', TRUE), $data);
                
                    //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('category'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('category/create'); //jika gagal maka akan ditampilkan form upload
            }
            
        }else{
            $this->update($this->input->post('category_ID', TRUE));
        }
    }

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-04 22:47:29 */
/* http://harviacode.com */