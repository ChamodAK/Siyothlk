<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 12/31/2018
 * Time: 6:19 PM
 */

class Gallery extends CI_Controller
{

    public function add_photos(){

        $this->load->model('Model_gallery');
        $data['b_list']=$this->Model_gallery->bird_list();
        $data['c_list']=$this->Model_gallery->cat_list();
        $this->load->view('add_photo',$data);

    }

    public function inst_photo(){
        $this->load->model('Model_gallery');
        $this->Model_gallery->insert_photo();

    }

    public function categories(){
        $this->load->model('Model_gallery');
        $data['category']=$this->Model_gallery->cat_list();
        $this->load->view('photo_category',$data);

    }

    public function add_image() {

        $this->load->model('Model_gallery');
        $data['b_list']=$this->Model_gallery->bird_list();
        $data['c_list']=$this->Model_gallery->cat_list();
        //$this->load->view('add_photo',$data);

        $this->load->view('add_photo', $data);

    }

    public function add_new_image() {

        $this->load->model('Model_gallery');
        $data['b_list']=$this->Model_gallery->bird_list();
        $data['c_list']=$this->Model_gallery->cat_list();

//        $this->form_validation->set_rules('title', 'Title', 'required');
//        $this->form_validation->set_rules('content', 'Article Content', 'required');

            $config['upload_path'] = './gallery_images/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);



                $image_info = $this->upload->data();
                $image_path = base_url("gallery_images/" . $image_info['raw_name'] . $image_info['file_ext']);
                $img_data['image'] = $image_path;

                $this->load->model('Model_gallery');
                $result = $this->Model_gallery->insert_photo($img_data);
                echo $result;

                if ($result) {

                    $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Image Submitted Successfully! </div>');
                    redirect('Home/Gallery');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
                    redirect('Gallery/add_image');
                }



    }



}