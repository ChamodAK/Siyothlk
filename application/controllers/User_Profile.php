<?php

class User_Profile extends CI_Controller {

    public function my_articles() {

        $this->load->model('Model_User');
        $result['articles'] = $this->Model_User->my_articles();

        if($result!=false) {
            $this->load->view('user/my_articles', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    public function my_forum_posts() {

        $this->load->view('user/my_forum_posts');

    }

    public function change_username() {

        $this->load->view('user/change_username');

    }
    public function change_password() {

        $this->load->view('user/change_password');

    }

    public function add_changed_username() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]', array('is_unique' => 'Username is already taken'));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/change_username');
        }
        else {

            $this->load->model('model_user');
            $result = $this->model_user->password_check();

            if($result!=false) {

                $this->load->model('model_user');
                $res = $this->model_user->change_username();

                if($res) {

                    $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Username changed successfully! </div>');
                    redirect('home/my_profile');
                }
                else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
                    redirect('home/my_profile');
                }

            }
            else {

                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Wrong Password! Please try again </div>');
                redirect('user_profile/change_username');

            }

        }

    }

    public function add_changed_password() {

        $this->form_validation->set_rules('np1', 'New Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('np2', 'Re-enter New Password', 'trim|required|matches[np1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/change_password');
        }
        else {

            $this->load->model('model_user');
            $result = $this->model_user->password_check();

            if($result!=false) {

                $this->load->model('model_user');
                $res = $this->model_user->change_password();

                if($res) {

                    $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Password changed successfully! </div>');
                    redirect('home/my_profile');
                }
                else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
                    redirect('home/my_profile');
                }

            }
            else {

                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Wrong Password! Please try again </div>');
                redirect('user_profile/change_password');

            }

        }

    }

    public function edit_article($id) {

        $this->load->model('Model_User');
        $result = $this->Model_User->get_edit_article($id);

        if($result!=false) {

            $data['article'] = array(

                'id' => $result->id,
                'title' => $result->title,
                'details' => $result->details

            );

            $this->load->view('user/edit_article', $data);

        }

        else {
            echo "Something went wrong !";
        }

    }

    public function submit_edit_article () {

        $this->load->model('Model_User');
        $result = $this->Model_User->submit_edit_article();

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Edited Article Submitted Successfully! </div>');
            redirect('User_Profile/my_articles');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('User_Profile/my_articles');
        }

    }

    public function delete_article($id) {

        $this->load->model('Model_User');
        $result = $this->Model_User->delete_article($id);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Article Deleted Successfully! </div>');
            redirect('User_Profile/my_articles');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('User_Profile/my_articles');
        }

    }

    public function my_images() {

        $this->load->model('Model_User');
        $result['images'] = $this->Model_User->my_images();

        if($result!=false) {
            $this->load->view('user/my_images', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    public function delete_image($id) {
        $data['id'] = $id;
        $this->load->view('user/delete_image' , $data);
    }

    public function delete_image_confirm($id) {


        $this->load->model('Model_User');
        $result = $this->Model_User->delete_image_confirm($id);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Image Deleted Successfully! </div>');
            redirect('Home/my_profile');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('Home/my_profile');
        }
    }

    public function delete_topic($id) {
        $data['id'] = $id;

        $this->load->view('user/delete_forum_topic' , $data);


    }

    public function delete_topic_confirm($id) {


        $this->load->model('Model_User');
        $result = $this->Model_User->delete_topic_confirm($id);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Topic Deleted Successfully! </div>');
            redirect('Home/forum');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('Home/forum');
        }
    }

}