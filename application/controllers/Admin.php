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

        $this->load->view('admin/add_bird_form', array('error' => ' '));

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

    public function add_new_bird() {

        $this->form_validation->set_rules('comName', 'Common Name', 'trim|required');
        $this->form_validation->set_rules('sciName', 'Scientific Name', 'trim|required|is_unique[bird.sciName]', array('is_unique' => 'Bird is already exists'));
        $this->form_validation->set_rules('size', 'Bird Size', 'trim|required|max_length[2]');
        $this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[1]');
        $this->form_validation->set_rules('colour1', 'Colour 01', 'trim|required');
        $this->form_validation->set_rules('location1', 'Location 01', 'trim|required');
        $this->form_validation->set_rules('map', 'Distribution Map', 'required');
        $this->form_validation->set_rules('details', 'Bird Details', 'required');
        $this->form_validation->set_rules('imgName', 'Image Name', 'trim|required|is_unique[bird.image]', array('is_unique' => 'Image name already exists'));

        if ($this->form_validation->run() == FALSE)
        {
            $this->add_bird();
        }
        else
        {


            $config['upload_path'] = './asset/wiki';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] = FALSE;
            $config['file_name'] = $this->input->post('imgName');
            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('image')) {

                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/add_bird_form', $error);

            }
            else {

                $this->load->model('Model_Bird_Wiki');
                $result = $this->Model_Bird_Wiki->add_new_bird();

                if ($result) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> New Bird Added Successfully! </div>');
                    redirect('admin/wiki');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
                    redirect('admin/wiki');
                }

            }

        }

    }


    public function delete_topic($id) {
        $data['id'] = $id;
        $this->load->view('admin/admin_delete_topic' , $data);


    }

    public function delete_topic_confirm($id) {


        $this->load->model('Model_Admin');
        $result = $this->Model_Admin->delete_topic_confirm($id);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Topic Deleted Successfully! </div>');
            redirect('Home/forum');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('Home/forum');
        }
    }

    public function edit_news($id) {

        $this->load->model('Model_News_Articles');
        $result = $this->Model_News_Articles->get_edit_news($id);

        if($result!=false) {

            $data['news'] = array(

                'id' => $result->id,
                'title' => $result->title,
                'details' => $result->details

            );

            $this->load->view('admin/edit_news', $data);

        }

        else {
            echo "Something went wrong !";

        }

    }

    public function delete_reply($post_id , $reply_id) {
        $data['post_id'] = $post_id;
        $data['reply_id'] = $reply_id;
        $this->load->view('admin/admin_delete_reply' , $data);


    }

    public function delete_reply_confirm($post_id , $reply_id) {


                $this->load->model('Model_Admin');
                $result = $this->Model_Admin->delete_reply_confirm($post_id, $reply_id);

                if ($result) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Reply Deleted Successfully! </div>');
                    redirect('Forum/full_post/' . "$post_id");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
                    redirect('Forum/full_post/' . "$post_id");
                }
            }

    public function submit_edit_news () {

        $this->load->model('Model_News_Articles');
        $result = $this->Model_News_Articles->submit_edit_news();

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Edited News Submitted Successfully! </div>');
            redirect('admin/news');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('admin/news');
        }

    }

    public function delete_news($id) {

        $this->load->model('Model_News_Articles');
        $result = $this->Model_News_Articles->delete_news($id);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> News Deleted Successfully! </div>');
            redirect('admin/news');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('admin/news');

        }

    }

    public function delete_image($id) {
        $data['id'] = $id;
        $this->load->view('admin/admin_delete_image' , $data);


    }

    public function delete_image_confirm($id) {


        $this->load->model('Model_Admin');
        $result = $this->Model_Admin->delete_image_confirm($id);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Image Deleted Successfully! </div>');
            redirect('Home/gallery');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('Home/gallery');
        }
    }


}