<?php

class User_Profile extends CI_Controller {

    //display articles posted by the user
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

    //display events posted by the user
    public function my_events() {

        $this->load->model('Model_User');
        $result['events'] = $this->Model_User->my_events();

        if($result!=false) {
            $this->load->view('user/my_events', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    //display form to change user's username
    public function change_username() {

        $this->load->view('user/change_username');

    }

    //display form to change user's password
    public function change_password() {

        $this->load->view('user/change_password');

    }

    //handle process after user submit changed username details
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

    //handle process after user submit new password details
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

    //display form to edit relevant article
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

    //display form to edit relevant event
    public function edit_event($id) {

        $this->load->model('Model_User');
        $result = $this->Model_User->get_edit_event($id);

        if($result!=false) {

            $data['event'] = array(

                'id' => $result->id,
                'title' => $result->title,
                'details' => $result->details

            );

            $this->load->view('user/edit_event', $data);

        }

        else {
            echo "Something went wrong !";
        }

    }

    //handle process when user submit edited article
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

    //handle process when user submit edited event
    public function submit_edit_event () {

        $this->load->model('Model_User');
        $result = $this->Model_User->submit_edit_event();

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Edited Event Submitted Successfully! </div>');
            redirect('User_Profile/my_events');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('User_Profile/my_events');
        }

    }

    //handle process when user wants to delete article
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

    //handle process when user wants to delete event
    public function delete_event($id) {

        $this->load->model('Model_User');
        $result = $this->Model_User->delete_event($id);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Event Deleted Successfully! </div>');
            redirect('User_Profile/my_events');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('User_Profile/my_events');
        }

    }

    //display images uploaded to the gallery by the user
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

    //handle process when user click delete image button
    public function delete_image($id) {
        $data['id'] = $id;
        $this->load->view('user/delete_image' , $data);
    }

    //handle process when user surely wants to delete an image
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

    //handle process when user click delete topic button in forum section
    public function delete_topic($id) {

        $data['id'] = $id;
        $this->load->view('user/delete_forum_topic' , $data);

    }

    //handle process when user surely wants to delete a topic in forum section
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

    //handle process when user click delete reply button in forum section
    public function delete_reply($post_id , $reply_id) {

        $data['post_id'] = $post_id;
        $data['reply_id'] = $reply_id;
        $this->load->view('user/delete_forum_reply' , $data);

    }

    //handle process when user surely wants to delete a reply in forum section
    public function delete_reply_confirm($post_id , $reply_id) {

        $this->load->model('Model_User');
        $result = $this->Model_User->delete_reply_confirm($post_id, $reply_id);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Reply Deleted Successfully! </div>');
            redirect('Forum/full_post/' . "$post_id");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('Forum/full_post/' . "$post_id");
        }

    }

    //handle process when user wants to edit a topic in forum section
    public function edit_topic($id) {

        $this->load->model('Model_User');
        $result = $this->Model_User->get_edit_topic($id);

        if($result!=false) {

            $data['topic'] = array(

                'id' => $result->id,
                'title' => $result->title,
                'details' => $result->details

            );

            $this->load->view('user/edit_forum_topic', $data);

        }

        else {
            echo "Something went wrong !";
        }

    }

    //handle submitting process when user edit a topic in forum section
    public function submit_edit_topic () {

        $this->load->model('Model_User');
        $result = $this->Model_User->submit_edit_topic();

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Edited Forum Topic Submitted Successfully! </div>');
            redirect('Home/forum');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('Home/forum');
        }

    }

}