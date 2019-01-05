<?php
/**
 * Created by PhpStorm.
 * User: ylmat
 * Date: 1/6/2019
 * Time: 2:26 AM
 */

class Model_Admin extends CI_Model {

    function delete_topic_confirm($id) {

        return $this->db->delete('forum', array('id' => $id));

    }

    function delete_reply_confirm($post_id , $reply_id) {

        $ids = array('reply_id' => $reply_id , 'forum_id' => $post_id);
        return $this->db->delete('forum_reply' , $ids);

    }

}