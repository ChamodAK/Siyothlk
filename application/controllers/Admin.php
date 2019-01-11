<?php

class Admin extends CI_Controller {

    //display admin dashboard main page
    public function index() {
        $this->load->view('admin/admin_dash_main');
    }

    //display admin wiki content management page
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

    //display all the news posted by admin
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

    //display all the articles in the database
    public function articles() {

        $this->load->model('Model_News_Articles');
        $result['articles'] = $this->Model_News_Articles->get_articles();

        if($result!=false) {
            $this->load->view('admin/admin_dash_articles', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    //display all the events in the database
    public function events() {

        $this->load->model('Model_Events');
        $result['events'] = $this->Model_Events->get_events();

        if($result!=false) {
            $this->load->view('admin/admin_dash_events', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    //display all the users in the database
    public function manage_users() {

        $this->load->model('Model_User');
        $result['users'] = $this->Model_User->get_users();

        if($result!=false) {
            $this->load->view('admin/admin_dash_manage_users', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    //handle process when admin click delete user button
    public function delete_user($userId) {

        $this->load->model('Model_User');
        $result = $this->Model_User->delete_user($userId);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> User Deleted Successfully! </div>');
            redirect('admin/manage_users');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('admin/manage_users');

        }

    }

    //display form to add a new news
    public function add_news() {

        $this->load->view('admin/admin_dash_add_news', array('error' => ' '));

    }

    //handle process when admin submit add new news form
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

    //display interface to add a new bird
    public function add_bird() {

        $this->load->view('admin/add_bird_form', array('error' => ' '));

    }

    //display list of all birds to be edited by admin
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

    //handle process when admin approve changes done by user
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

    //handle process when admin dismiss changes done by user
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

    //handle process when admin submitted edited bird details of a particular bird
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

    //handle process when admin submit a new bird form
    public function add_new_bird() {

        $this->form_validation->set_rules('comName', 'Common Name', 'trim|required');
        $this->form_validation->set_rules('sciName', 'Scientific Name', 'trim|required|is_unique[bird.sciName]', array('is_unique' => 'Bird is already exists'));
//        $this->form_validation->set_rules('size', 'Bird Size', 'trim|required|max_length[2]');
//        $this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[1]');
        $this->form_validation->set_rules('colour1', 'Colour 01', 'trim|required');
//        $this->form_validation->set_rules('location1', 'Location 01', 'trim|required');
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


    //confirm forum topic deletion
    public function delete_topic($id) {

        $data['id'] = $id;
        $this->load->view('admin/admin_delete_topic' , $data);

    }

    //handle deleting forum topic process
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

    //display form to edit news
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

    //display form to edit article
    public function edit_article($id) {

        $this->load->model('Model_News_Articles');
        $result = $this->Model_News_Articles->get_edit_article($id);

        if($result!=false) {

            $data['article'] = array(

                'id' => $result->id,
                'title' => $result->title,
                'details' => $result->details

            );

            $this->load->view('admin/edit_article', $data);

        }

        else {
            echo "Something went wrong !";

        }

    }

    //display form to edit event
    public function edit_event($id) {

        $this->load->model('Model_Events');
        $result = $this->Model_Events->get_edit_event($id);

        if($result!=false) {

            $data['event'] = array(

                'id' => $result->id,
                'title' => $result->title,
                'details' => $result->details

            );

            $this->load->view('admin/edit_event', $data);

        }
        else {
            echo "Something went wrong !";
        }

    }

    //confirm reply deletion by admin
    public function delete_reply($post_id , $reply_id) {

        $data['post_id'] = $post_id;
        $data['reply_id'] = $reply_id;
        $this->load->view('admin/admin_delete_reply' , $data);

    }

    //handle reply deletion process
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

    //handle process when admin submit edit news form
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

    //handle process when admin submit edit article form
    public function submit_edit_article () {

        $this->load->model('Model_News_Articles');
        $result = $this->Model_News_Articles->submit_edit_article();

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Edited Article Submitted Successfully! </div>');
            redirect('admin/articles');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('admin/articles');
        }

    }

    //handle process when admin submit edit event form
    public function submit_edit_event () {

        $this->load->model('Model_Events');
        $result = $this->Model_Events->submit_edit_event();

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Edited Event Submitted Successfully! </div>');
            redirect('admin/events');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('admin/events');
        }

    }

    //handle process when admin click delete news button
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

    //handle process when admin click delete article button
    public function delete_article($id) {

        $this->load->model('Model_News_Articles');
        $result = $this->Model_News_Articles->delete_article($id);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> News Deleted Successfully! </div>');
            redirect('admin/articles');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('admin/articles');

        }

    }

    //handle process when admin click delete event button
    public function delete_event($id) {

        $this->load->model('Model_Events');
        $result = $this->Model_Events->delete_event($id);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Event Deleted Successfully! </div>');
            redirect('admin/events');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('admin/events');

        }

    }

    //confirm image deletion by admin
    public function delete_image($id) {

        $data['id'] = $id;
        $this->load->view('admin/admin_delete_image' , $data);

    }

    //handle image deletion process by admin
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