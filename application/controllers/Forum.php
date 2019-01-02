<?php
/**
 * Created by PhpStorm.
 * User: ylmat
 * Date: 1/2/2019
 * Time: 9:01 AM
 */

class Forum extends CI_Controller {

    public function full_forum(){
        $this->load->view('forum_full_topic');
    }

    public function add_post() {

        $this->load->view('forum_add_post', array('error' => ' '));

    }
    public function add_new_post() {

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Article Content', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->add_post();
        }
        else
        {

            $config['upload_path'] = './asset/images/forum/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('userfile')) {
                $image_info = $this->upload->data();
                $image_path = base_url("asset/images/forum/" . $image_info['raw_name'] . $image_info['file_ext']);
            }
            $data = array();
            $data['image'] = $image_path;

            $this->load->model('Model_Forum');

            $result = $this->Model_Forum->add_new_post($data);
            //echo $result;

            if ($result) {

                $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Post Submitted Successfully! </div>');
                redirect('Home/forum');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
                redirect('Forum/add_post');
            }



        }

    }
}