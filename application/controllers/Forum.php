<?php
/**
 * Created by PhpStorm.
 * User: ylmat
 * Date: 1/2/2019
 * Time: 9:01 AM
 */

class Forum extends CI_Controller {

    public function full_forum(){
        $this->load->view('forum_full_topic');
    }

    public function add_topic(){
        $this->load->view('forum_add_topic');
    }
}