<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 12/31/2018
 * Time: 6:19 PM
 */

class Gallery extends CI_Controller
{

    public function categories(){
        $this->load->model('Model_gallery');
        $data['category']=$this->Model_gallery->get_bird_categories();
        $this->load->view('photo_category',$data);

    }


}