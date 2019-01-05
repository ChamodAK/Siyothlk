<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 12/31/2018
 * Time: 6:19 PM
 */

class Gallery extends CI_Controller
{

    public function add_image() {
        $this->load->model('Model_Bird_Wiki');
        $data['birds'] = $this->Model_Bird_Wiki->get_bird_list();
        $data['error'] = ' ';
        $this->load->view('add_image' , $data);
    }

    public function add_new_image() {

        $data = array();
        $this->load->model('Model_Bird_Wiki');
        $data['birds'] = $this->Model_Bird_Wiki->get_bird_list();

        $this->form_validation->set_rules('content', 'Image Content', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->add_image();
        }
        else
        {

            $config['upload_path'] = './gallery_images/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $data['error'] = $this->upload->display_errors();

                $this->load->view('add_image', $data);
            }
            else {

                $image_info = $this->upload->data();
                $image_path = base_url("gallery_images/" . $image_info['raw_name'] . $image_info['file_ext']);
                $image_data['image'] = $image_path;

                $this->load->model('Model_Gallery');
                $result = $this->Model_Gallery->add_new_image($image_data);
                echo $result;

                if ($result) {

                    $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Image Submitted Successfully! </div>');
                    redirect('Home/gallery');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
                    redirect('Gallery/add_image');
                }

            }

        }

    }
}