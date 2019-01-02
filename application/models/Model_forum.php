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
}