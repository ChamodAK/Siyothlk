<?php

class Model_user extends CI_Model {

    //add new user to database
    function insert_user_data () {

        $data = array(

            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password')),
            'email' => $this->input->post('email'),
            'memberFlag' => 1
        );

        return $this->db->insert('user', $data);

    }

    //check whether login credentials of a user correct or not
    function login_user() {

        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('user');

        if($result->num_rows()==1) {
            return $result->row(0);
        }
        else {
            return false;
        }

    }

    //check whether the password provided by the user correct or not
    function password_check() {

        $id = $this->session->userdata('id');
        $password = sha1($this->input->post('password'));

        $this->db->where('userId', $id);
        $this->db->where('password', $password);
        $result = $this->db->get('user');

        if($result->num_rows()==1) {
            return $result->row(0);
        }
        else {
            return false;
        }

    }

    //get user's details from database
    public function get_my_profile($id) {

        $query = $this->db->query("SELECT user.username, user.email FROM siyothlk.user WHERE user.userId = $id;");
        return $query->row(0);

    }

    //update database with the newly provided username
    function change_username () {

        $data = array(

            'username' => $this->input->post('username')

        );

        $this->db->where('userId', $this->session->userdata('id'));
        return $this->db->update('user', $data);

    }

    //update database with newly provided password
    function change_password () {

        $data = array(

            'password' => sha1($this->input->post('np1'))

        );

        $this->db->where('userId', $this->session->userdata('id'));
        return $this->db->update('user', $data);

    }

    //get articles posted by the user from database
    public function my_articles() {

        $id = $this->session->userdata('id');

        $query = $this->db->query("SELECT article.id, article.title, article.timeStamp FROM siyothlk.article WHERE article.userId = '$id';");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    //get events posted by the user from database
    public function my_events() {

        $id = $this->session->userdata('id');

        $query = $this->db->query("SELECT event.id, event.title, event.timeStamp FROM siyothlk.event WHERE event.userId = '$id';");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    //get details of the article to edit
    public function get_edit_article ($id) {

        $query = $this->db->query("SELECT article.id, article.title, article.details FROM siyothlk.article WHERE article.id = $id;");
        return $query->row(0);

    }

    //get details of the event to edit
    public function get_edit_event ($id) {

        $query = $this->db->query("SELECT event.id, event.title, event.details FROM siyothlk.event WHERE event.id = $id;");
        return $query->row(0);

    }

    //update database with the edited article by user
    public function submit_edit_article() {

        $data = array(
            'title' => $this->input->post('title'),
            'details' => $this->input->post('details'),
            'timeStamp' => date ('Y-m-d H:i:s')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('article', $data);

    }

    //update database with the edited event by user
    public function submit_edit_event() {

        $data = array(
            'title' => $this->input->post('title'),
            'details' => $this->input->post('details'),
            'timeStamp' => date ('Y-m-d H:i:s')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('event', $data);

    }

    //delete a article from database
    public function delete_article($id) {

        return $this->db->delete('article', array('id' => $id));

    }

    //delete a event from database
    public function delete_event($id) {

        return $this->db->delete('event', array('id' => $id));

    }

    //get images uploaded by the user from database
    public function my_images() {

        $id = $this->session->userdata('id');

        $query = $this->db->query("SELECT image.imageId , image.link , bird.comName , bird.otherName , bird.sciName FROM image JOIN user ON image.userId = user.userId JOIN bird ON image.bird_id = bird.birdId WHERE image.userId = '$id';");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    //delete image from database
    function delete_image_confirm($id) {

        return $this->db->delete('image', array('imageId' => $id));

    }

    //delete forum topic from database
    function delete_topic_confirm($id) {

        return $this->db->delete('forum', array('id' => $id));

    }

    //delete forum reply from database
    function delete_reply_confirm($post_id , $reply_id) {

        $ids = array('reply_id' => $reply_id, 'forum_id' => $post_id);
        return $this->db->delete('forum_reply', $ids);

    }
      
    //get all the registered users in the user table in database
    public function get_users() {

        $query = $this->db->query("SELECT user.userId, user.username, user.email FROM siyothlk.user WHERE memberFlag = 1;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    //delete a user from database
    function delete_user($id) {
      
        return $this->db->delete('user', array('userId' => $id));
      
    }

    //get details to edit a forum topic from the database
    public function get_edit_topic ($id) {

        $query = $this->db->query("SELECT forum.id, forum.title, forum.details FROM siyothlk.forum WHERE forum.id = $id;");
        return $query->row(0);

    }

    //update database with details of edited forum topic
    public function submit_edit_topic() {

        $data = array(
            'title' => $this->input->post('title'),
            'details' => $this->input->post('details'),
            'timeStamp' => date ('Y-m-d H:i:s')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('forum', $data);

    }


}