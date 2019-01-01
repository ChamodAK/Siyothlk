<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 12/31/2018
 * Time: 6:19 PM
 */

class Gallery extends CI_Controller
{

    public function add_photos(){
        $this->load->view('add_photo');
    }

    public function inst_photo(){
        $this->load->model('Model_gallery');
        $this->Model_gallery->insert_photo();

    }

}