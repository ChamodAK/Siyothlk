<?php
/**
 * Created by PhpStorm.
 * User: ylmat
 * Date: 1/3/2019
 * Time: 2:10 AM
 */

class Model_forum extends CI_Model {

    public function add_new_post($data) {

        $data = array(

            'title' => $this->input->post('title', TRUE),
            'details' => $this->input->post('content', TRUE),
            'timeStamp' => date('Y-m-d H:i:s'),
            'image' => $data['image'],
            'userId' => $this->session->userdata('id')

        );

        return $this->db->insert('forum', $data);
    }

    public function get_posts() {

        $query = $this->db->query("SELECT forum.id, forum.title, forum.timeStamp, user.username FROM siyothlk.forum JOIN user on forum.userId = user.userId ORDER BY forum.timeStamp DESC;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }


    }

    public function get_full_post($id) {

        $query = $this->db->query("SELECT forum.id, forum.title, forum.details, forum.timeStamp, forum.image, forum.userId, user.username FROM siyothlk.forum JOIN user on forum.userId = user.userId WHERE forum.id = $id;");

        return $query->row(0);

    }

    public function add_new_reply($post_id) {

        $data = array(

            'details' => $this->input->post('content', TRUE),
            'date_posted' => date('Y-m-d H:i:s'),
            'user_id' => $this->session->userdata('id'),
            'forum_id' => $post_id,

        );

        return $this->db->insert('forum_reply', $data);
    }
}