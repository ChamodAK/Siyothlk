<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$this->load->view('home');
	}

	public function login() {
	    $this->load->view('login');
    }

    public function sign_up() {
        $this->load->view('sign_up');
    }

    public function dashboard() {
        $this->load->view('admin/admin_dash_main');
    }

    public function bird_wiki() {

        $this->load->model('Model_Bird_Wiki');
        $result['birds'] = $this->Model_Bird_Wiki->get_few_birds();

        if($result!=false) {
            $this->load->view('bird_wiki', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    public function sanctuary() {

        $this->load->model('Model_Sanctuary');
        $this->data['sanctuaries'] = $this->Model_Sanctuary->get_data();
        $this->load->view('sanctuary' , $this->data);
    }

    public function news_and_articles() {

	    $this->load->model('Model_News_Articles');
	    $result['news'] = $this->Model_News_Articles->get_few_news();
	    $result['articles'] = $this->Model_News_Articles->get_few_articles();

	    if($result!=false) {

            $this->load->view('news_articles', $result);

        }
        else {
            echo "Something went wrong !";
        }

    }

    public function events() {

        $this->load->model('Model_Events');
        $result['events'] = $this->Model_Events->get_events();

        if($result!=false) {

            $this->load->view('events', $result);

        }
        else {
            echo "Something went wrong !";
        }

    }

    public function my_profile() {

        $id = $this->session->userdata('id');

        $this->load->model('Model_User');
        $result = $this->Model_User->get_my_profile($id);

        if($result!=false) {

            $data['profile'] = array(
                'id' => $id,
                'username' => $result->username,
                'email' => $result->email
            );

            $this->load->view('user/my_profile_main', $data);

        }
        else {
            echo "Something went wrong !";
        }

    }

    public function gallery(){

        $this->load->model("Model_gallery");
        $result['images']=$this->Model_gallery->get_images();

        if($result!=false){
            $this->load->view('gallery',$result);

        }
    }

    public function forum() {

        $this->load->model('Model_Forum');
        $result['posts'] = $this->Model_Forum->get_posts();
        $result['topic_count'] = $this->Model_Forum->count_topics();
        $result['member_count'] = $this->Model_Forum->count_users();

        $sortby = $this->input->get('sortby');
        if ($sortby == "newest"){
            $result['posts'] = $this->Model_Forum->sort_by_newest();
        }
        else if ($sortby == "oldest"){
            $result['posts'] = $this->Model_Forum->sort_by_oldest();
        }


        if($result!=false) {

            $this->load->view('forum', $result);

        }
        else {
            echo "Something went wrong !";
        }

    }

    public function sanctuary_map() {
	    $this->load->view('map_sanctuary');
    }

    public function pic_map() {
        $this->load->model('Model_gallery');
        $result['names'] = $this->Model_gallery->get_bird_names();
	    $this->load->view('pic_map' , $result);
    }

    public function distribution_map() {
        $this->load->model('Model_Bird_Wiki');
        $result['birds'] = $this->Model_Bird_Wiki->get_bird_list();

        $this->load->view('distribution_map', $result);
    }

    public function get_bird_map($id) {
        $this->load->model('Model_Bird_Wiki');
        $result['birds'] = $this->Model_Bird_Wiki->get_bird_list();
        $result['maps'] = $this->Model_Bird_Wiki->get_bird_map($id);

        $this->load->view('bird_map', $result);
    }

    public function search() {

        $this->load->model('Model_Search');
        $result['result'] = $this->Model_Search->get_results();

        if($result!=false) {
            $this->load->view('search_result', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }



}
