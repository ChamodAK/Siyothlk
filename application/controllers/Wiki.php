<?php

class Wiki extends CI_Controller{

    //show full detail page of a particular bird
    public function get_full_bird ($birdId) {

        $this->load->model('Model_Bird_Wiki');
        $result = $this->Model_Bird_Wiki->get_full_bird($birdId);

        if($result!=false) {

            $data['bird'] = array(

                'birdId' => $result->birdId,
                'comName' => $result->comName,
                'sciName' => $result->sciName,
                'otherName' => $result->otherName,
                'details' => $result->details,
                'disMapLink' => $result->disMapLink,
                'image' => $result->image

            );

            $this->load->view('full_bird', $data);

        }

        else {
            echo "Something went wrong !";
        }

    }

    //display editable version of details of a particular bird
    public function edit_bird_view($birdId) {

        $this->load->model('Model_Bird_Wiki');
        $result = $this->Model_Bird_Wiki->get_edit_bird($birdId);

        if($result!=false) {

            $data['bird'] = array(

                'birdId' => $result->birdId,
                'details' => $result->details,
                'comName' => $result->comName

            );

            $this->load->view('edit_bird', $data);

        }
        else {
            echo "Something went wrong !";
        }

    }

    //display editable version of details of a particular bird for admin
    public function edit_bird_view_admin($birdId) {

        $this->load->model('Model_Bird_Wiki');
        $result = $this->Model_Bird_Wiki->get_edit_bird($birdId);

        if($result!=false) {

            $data['bird'] = array(

                'birdId' => $result->birdId,
                'details' => $result->details

            );

            $this->load->view('admin/edit_bird_admin', $data);

        }

        else {
            echo "Something went wrong !";
        }

    }

    //add changes of a bird made by a user to database
    public function edit_bird () {

        $this->load->model('Model_Bird_Wiki');
        $result = $this->Model_Bird_Wiki->add_edit_bird();

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Changes Submitted Successfully! </div>');
            redirect('Home/bird_wiki');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('Home/bird_wiki');
        }


    }

    //handle process when admin delete a bird
    public function delete_bird ($birdId) {

        $this->load->model('Model_Bird_Wiki');
        $result = $this->Model_Bird_Wiki->delete_bird($birdId);

        if ($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Record Deleted Successfully! </div>');
            redirect('Admin/wiki');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
            redirect('Admin/wiki');
        }

    }

    //display bird categories home page
    public function categories() {

        $this->load->model('Model_Bird_Wiki');
        $result['categories'] = $this->Model_Bird_Wiki->get_categories();

        if($result!=false) {
            $this->load->view('category_main', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    //display all the details of a particular bird category
    public function get_full_category ($id) {

        $this->load->model('Model_Bird_Wiki');
        $result['category'] = $this->Model_Bird_Wiki->get_full_category($id);

        if($result!=false) {

            $this->load->view('full_category', $result);

        }

        else {
            echo "Something went wrong !";
        }

    }

    //display full bird list in bird wiki category section
    public function bird_list() {

        $this->load->model('Model_Bird_Wiki');
        $result['birds'] = $this->Model_Bird_Wiki->get_all_birds();

        if($result!=false) {
            $this->load->view('bird_list', $result);
        }
        else {
            echo "Something went wrong !";
        }

    }

    //display advanced search questionnaire
    public function advanced_search_view() {

        $this->load->view('advanced_search');

    }

    //handle the process after user submitted answers to the advanced search questionnaire
    public function advanced_search() {

        $size = $this->input->post('size');
        $location = $this->input->post('location');
        $colours = $this->input->post('colour');
        $col_length = sizeof($colours);

        if(!($col_length==1 or $col_length==2)) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Please select one or two colours only! </div>');
            redirect('Wiki/advanced_search_view');
        }
        elseif($col_length==1) {

            $this->load->model('Model_Bird_Wiki');
            $result['birds'] = $this->Model_Bird_Wiki->advanced_search($size, $colours[0], $location);

            if($result!=false) {
                $this->load->view('advanced_search_result', $result);
            }
            else {
                echo "Something went wrong !";
            }

        }
        else {

            $this->load->model('Model_Bird_Wiki');
            $result['birds'] = $this->Model_Bird_Wiki->advanced_search_2($size, $colours[0], $colours[1], $location);

            if($result!=false) {
                $this->load->view('advanced_search_result', $result);
            }
            else {
                echo "Something went wrong !";
            }

        }

    }


}