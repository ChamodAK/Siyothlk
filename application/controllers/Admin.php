<?php

class Admin extends CI_Controller {

    public function index() {
        $this->load->view('admin/admin_dash_main');
    }

    public function wiki() {

        $this->load->model('Model_Bird_Wiki');
        $result['contents'] = $this->Model_Bird_Wiki->get_edited_contents();

        if($result!=false) {
            $this->load->view('admin/admin_dash_wiki', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    public function news() {

        $this->load->model('Model_News_Articles');
        $result['news'] = $this->Model_News_Articles->get_news();

        if($result!=false) {
            $this->load->view('admin/admin_dash_news', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    public function articles() {
        $this->load->view('admin/admin_dash_articles');
    }

    public function add_news() {
        $this->load->view('admin/admin_dash_add_news', array('error' => ' '));
    }

    public function add_new_news() {

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->add_news();
        }
        else
        {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('add_news', $error);
            }
            else {

                $image_info = $this->upload->data();
                $image_path = base_url("uploads/" . $image_info['raw_name'] . $image_info['file_ext']);
                $data['image'] = $image_path;

                $this->load->model('Model_News_Articles');

                $result = $this->Model_News_Articles->add_new_news($data);

                if ($result) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> News Added Successfully! </div>');
                    redirect('admin/news');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
                    redirect('admin/news');
                }

            }

        }

    }

    public function add_bird() {
        $this->load->view('admin/add_bird');
    }

    public function edit_bird() {

        $this->load->model('Model_Bird_Wiki');
        $result['birds'] = $this->Model_Bird_Wiki->get_bird_list();

        if($result!=false) {
            $this->load->view('admin/edit_bird', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    public function approve_changes($id) {

        $this->load->model('Model_Bird_Wiki');
        $result = $this->Model_Bird_Wiki->approve_changes($id);

        if(($result['var1'] && $result['var2'])!=false) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Changes Applied Successfully! </div>');
            redirect('admin/wiki');
        }
        else {
            echo "Something went wrong !";
        }

    }

    public function dismiss_changes($id) {

        $this->load->model('Model_Bird_Wiki');
        $result = $this->Model_Bird_Wiki->dismiss_changes($id);

        if($result != false) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Changes Dismissed Successfully! </div>');
            redirect('admin/wiki');
        }
        else {
            echo "Something went wrong !";
        }

    }

    public function edit_bird_admin () {

        $this->load->model('Model_Bird_Wiki');
        $result = $this->Model_Bird_Wiki->add_edit_bird_admin();

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Changes Submitted Successfully! </div>');
            redirect('Admin/wiki');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('Admin/wiki');
        }


    }


}