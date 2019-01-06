<?php

class Model_user extends CI_Model {

    function insert_user_data () {

        $data = array(

            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password')),
            'email' => $this->input->post('email'),
            'memberFlag' => 1
        );

        return $this->db->insert('user', $data);

    }

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

    public function get_my_profile($id) {

        $query = $this->db->query("SELECT user.username, user.email FROM siyothlk.user WHERE user.userId = $id;");
        return $query->row(0);

    }

    function change_username () {

        $data = array(

            'username' => $this->input->post('username')

        );

        $this->db->where('userId', $this->session->userdata('id'));
        return $this->db->update('user', $data);

    }

    function change_password () {

        $data = array(

            'password' => sha1($this->input->post('np1'))

        );

        $this->db->where('userId', $this->session->userdata('id'));
        return $this->db->update('user', $data);

    }

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

    public function get_edit_article ($id) {

        $query = $this->db->query("SELECT article.id, article.title, article.details FROM siyothlk.article WHERE article.id = $id;");
        return $query->row(0);

    }

    public function submit_edit_article() {

        $data = array(
            'title' => $this->input->post('title'),
            'details' => $this->input->post('details'),
            'timeStamp' => date ('Y-m-d H:i:s')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('article', $data);

    }

    public function delete_article($id) {

        return $this->db->delete('article', array('id' => $id));

    }

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

    function delete_image_confirm($id) {

        return $this->db->delete('image', array('imageId' => $id));

    }


}