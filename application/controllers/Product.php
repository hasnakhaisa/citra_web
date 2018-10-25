<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Product_model','Category_model'));
        $this->load->library(array('form_validation', 'datatables', 'upload'));        
    }

    public function index()
    {   
        $this->load->view('product/product_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        $row = $this->Product_model->json();
        $json_data = json_decode($row);
        $data = $json_data->data;

        $json = array();

        for ($i=0; $i < sizeof($data); $i++) { 
            $category = $this->Category_model->get_by_id($data[$i]->product_category);
            $categoryName = $category->category_name;
            $echo_img = '<img style="width: 150px"  src="'.$data[$i]->product_image.'">';
            $json[] = array(
                        'product_ID' => $data[$i]->product_ID,
                        'product_name' => $data[$i]->product_name,
                        'product_category' => $categoryName,
                        'product_price' => $data[$i]->product_price,
                        'product_description' => $data[$i]->product_description,
                        'product_image' => $echo_img,
                        'product_time_duration' => $data[$i]->product_time_duration,
                        'product_dimensions' => $data[$i]->product_dimensions,
                        'product_weight' => $data[$i]->product_weight,
                        'popular' => $data[$i]->popular,
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
        $row = $this->Product_model->get_by_id($id);
        $category = $this->Category_model->get_by_id($row->product_category);
        if ($row) {
            $data = array(
    		'product_ID' => $row->product_ID,
    		'product_name' => $row->product_name,
    		'product_category' => $category,
    		'product_price' => $row->product_price,
    		'product_description' => $row->product_description,
            'product_image' => $row->product_image,

    		'product_time_duration' => $row->product_time_duration,
            'product_dimensions' => $row->product_dimensions,
            'product_weight' => $row->product_weight,
            'popular' => $row->popular,
	    );
            $this->load->view('product/product_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('product'));
        }
    }

    public function create() 
    {

        $data = array(
            'button' => 'Tambah Data',
            'action' => site_url('product/create_action'),
    	    'product_ID' => set_value('product_ID'),
    	    'product_name' => set_value('product_name'),
    	    'product_category' => array(
                    'list' => $this->Category_model->get_all(),
                    'checked' => '0'
                ),
    	    'product_price' => set_value('product_price'),
    	    'product_description' => set_value('product_description'),
            'product_image' => set_value('product_image'),
    	    'product_time_duration' => set_value('product_time_duration'),
            'product_dimensions' => set_value('product_dimensions'),
            'product_weight' => set_value('product_weight'),
            'popular' => set_value('popular'),

    	);
        $this->load->view('product/product_form', $data);
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
        $row = $this->Product_model->get_by_id($id);
        $rows = $this->Category_model->get_by_id($id);
        if ($row) {
           
            $data = array(
                'button' => 'Perbarui Data',
                'action' => site_url('product/update_action'),
        		'product_ID' => set_value('product_ID', $row->product_ID),
        		'product_name' => set_value('product_name', $row->product_name),
        		'product_category' => array(
                        'list' => $this->Category_model->get_all(),
                        'checked' => $row->product_category,
                    ),
        		'product_price' => set_value('product_price', $row->product_price),
        		'product_description' => set_value('product_description', $row->product_description),
                'product_image' => set_value('product_image', $row->product_image),
        		'product_time_duration' => set_value('product_time_duration', $row->product_time_duration),
                'product_dimensions' => set_value('product_dimensions', $row->product_dimensions),
                'product_weight' => set_value('product_weight', $row->product_weight),
                'popular' => set_value('popular', $row->popular),

    	    );
            $this->load->view('product/product_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('product'));
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
        $row = $this->Product_model->get_by_id($id);

        if ($row) {
            $this->Product_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus !');
            redirect(site_url('product'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan !');
            redirect(site_url('product'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('product_name', 'product name', 'trim|required');
    	$this->form_validation->set_rules('product_category', 'product category','required');
    	$this->form_validation->set_rules('product_price', 'product price', 'trim|required');
    	$this->form_validation->set_rules('product_description', 'product description', 'trim|required');
        $this->form_validation->set_rules('product_image', 'product image','required');
    	$this->form_validation->set_rules('product_time_duration', 'product time duration', 'trim|required');

        $this->form_validation->set_rules('product_dimensions', 'product dimensions', 'trim|required');
        $this->form_validation->set_rules('product_weight', 'product weight', 'trim|required');

        $this->form_validation->set_rules('popular', 'popular banget');



    	$this->form_validation->set_rules('product_ID', 'product_ID', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function create_action()
    {

        $filename = $_FILES['product_image']['name'];
        $config['upload_path'] = './assets/uploads/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '9000'; //maksimum besar file 3M
        $config['remove_space'] = TRUE;
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $filename; //nama yang terupload nantinya
        $filename = str_replace(' ', '_', $filename);
        $this->upload->initialize($config);
        
        if($_FILES['product_image']['name'])
        {
            if ($this->upload->do_upload('product_image'))
            {
                $gbr = $this->upload->data();
                if(set_value('popular', $row->popular) == NULL)
                {
                    $popular = "tidakpopular";
                }
                else{

                    $popular = "popular";
                }
              
                $data = array(
                    'product_image' => 'assets/uploads/' .$filename,
                    'product_name' => $this->input->post('product_name',TRUE),
                    'product_category' => $this->input->post('product_category',TRUE),
                    'product_price' => $this->input->post('product_price',TRUE),
                    'product_description' => $this->input->post('product_description',TRUE),
                    'product_time_duration' => $this->input->post('product_time_duration',TRUE),
                    'product_dimensions' => $this->input->post('product_dimensions',TRUE),
                    'product_weight' => $this->input->post('product_weight',TRUE),
                    
                    'popular' => $popular,
                );

                $this->Product_model->insert($data); //akses model untuk menyimpan ke database
                
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('product'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('product/create'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }

    public function update_action() 
    {
        $filename = $_FILES['product_image']['name'];
        $config['upload_path'] = './assets/uploads/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['remove_space'] = TRUE;
        $config['file_name'] = $filename; //nama yang terupload nantinya
        $filename = str_replace(' ', '_', $filename);

        $this->upload->initialize($config);

        $this->_rules();

        if($_FILES['product_image']['name'])
        {
            if($this->input->post('popular',TRUE) == NULL)
            {
                    $popular = "tidakpopular";
            }
            else{

                    $popular = "popular";
            }
            if ($this->upload->do_upload('product_image'))
            {
                
                $gbr = $this->upload->data();
                $data = array(
                    'product_image' => 'assets/uploads/' .$filename,
                    'product_name' => $this->input->post('product_name',TRUE),
                    'product_category' => $this->input->post('product_category',TRUE),
                    'product_price' => $this->input->post('product_price',TRUE),
                    'product_description' => $this->input->post('product_description',TRUE),
                    'product_time_duration' => $this->input->post('product_time_duration',TRUE),
                    'product_dimensions' => $this->input->post('product_dimensions',TRUE),
                    'product_weight' => $this->input->post('product_weight',TRUE),

                    'popular' => $popular,
                );

                $this->Product_model->update($this->input->post('product_ID', TRUE), $data);
                
                    //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('product'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('product/create'); //jika gagal maka akan ditampilkan form upload
            }
            
        }else{
            $this->update($this->input->post('product_ID', TRUE));
        }
    }

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-04 22:47:29 */
/* http://harviacode.com */