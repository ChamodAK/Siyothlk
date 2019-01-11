<?php

class Model_News_Articles extends CI_Model{

    //add new article to the database
    public function add_new_article($data) {

        $data = array(

            'title' => $this->input->post('title'),
            'details' => $this->input->post('content'),
            'timeStamp' => date ('Y-m-d H:i:s'),
            'image' => $data['image'],
            'userId' => $this->session->userdata('id')

        );

        return $this->db->insert('article', $data);

    }

    //add new news to news table in database
    public function add_new_news($data) {

        $data = array(

            'title' => $this->input->post('title'),
            'details' => $this->input->post('content'),
            'timeStamp' => date ('Y-m-d H:i:s'),
            'image' => $data['image'],
            'userId' => $this->session->userdata('id')

        );

        return $this->db->insert('news', $data);

    }

    //get all the articles
    public function get_articles() {

        $query = $this->db->query("SELECT article.id, article.title, article.details, article.timeStamp, article.image, article.userId, user.username FROM siyothlk.article JOIN user on article.userId = user.userId ORDER BY article.timeStamp DESC;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }


    }

    //get news to be displayed in admin dashboard
    public function get_news() {

        $query = $this->db->query("SELECT news.id, news.title, news.details, news.timeStamp, news.image, news.userId, user.username FROM siyothlk.news JOIN user on news.userId = user.userId ORDER BY news.timeStamp DESC;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    //get few articles to display on News & Article home page
    public function get_few_articles() {

        $query = $this->db->query("SELECT article.id, article.title, article.details, article.timeStamp, article.image, article.userId, user.username FROM siyothlk.article JOIN user on article.userId = user.userId ORDER BY article.timeStamp DESC LIMIT 3;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }


    }

    //get few news to display on News & Article home page
    public function get_few_news() {

        $query = $this->db->query("SELECT news.id, news.title, news.details, news.timeStamp, news.image, news.userId, user.username FROM siyothlk.news JOIN user on news.userId = user.userId ORDER BY news.timeStamp DESC LIMIT 3;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }


    }

    //get full details of an article
    public function get_full_article($id) {

        $query = $this->db->query("SELECT article.id, article.title, article.details, article.timeStamp, article.image, article.userId, user.username FROM siyothlk.article JOIN user on article.userId = user.userId WHERE article.id=$id;");

        return $query->row(0);

    }

    //get full details of an news
    public function get_full_news($id) {

        $query = $this->db->query("SELECT news.id, news.title, news.details, news.timeStamp, news.image, news.userId, user.username FROM siyothlk.news JOIN user on news.userId = user.userId WHERE news.id=$id;");

        return $query->row(0);

    }

    //get full details of a news to be edited by admin
    public function get_edit_news ($id) {

        $query = $this->db->query("SELECT news.id, news.title, news.details FROM siyothlk.news WHERE news.id = $id;");
        return $query->row(0);

    }

    //get full details of a article to be edited by admin
    public function get_edit_article ($id) {

        $query = $this->db->query("SELECT article.id, article.title, article.details FROM siyothlk.article WHERE article.id = $id;");
        return $query->row(0);

    }

    //update database with edited news
    public function submit_edit_news() {

        $data = array(
            'title' => $this->input->post('title'),
            'details' => $this->input->post('details'),
            'timeStamp' => date ('Y-m-d H:i:s')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('news', $data);

    }

    //update database with edited article
    public function submit_edit_article() {

        $data = array(
            'title' => $this->input->post('title'),
            'details' => $this->input->post('details'),
            'timeStamp' => date ('Y-m-d H:i:s')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('article', $data);

    }

    //delete a news from database
    public function delete_news($id) {

        return $this->db->delete('news', array('id' => $id));

    }

    //delete a article from database
    public function delete_article($id) {

        return $this->db->delete('article', array('id' => $id));

    }


}