<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic_Map extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('javascript');
	}
	
	public function index()
	{
		// Load the Birds model and get all the saved locations
		$this->load->model('Model_Pic_Map');
		$locations = $this->Model_Pic_Map->get_all_locations();

		$data = array(
			'locations' => $locations,
            'error' => ''
		);

		// Pass the retrieved locations to the view
		$this->load->view('pic_map',$data);
	}

	public function saveLocation() {

        $config['upload_path'] = './pic_map/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('pic_map', $error);
        }
        else {

            $image_info = $this->upload->data();
            $image_path = $image_info['raw_name'] . $image_info['file_ext'];

            $location = $this->input->post('location');
            $this->load->model('Model_Pic_Map');
            $status = ($this->Model_Pic_Map->insert_location($location, $image_path));

            // Check if the insert operation is successful
            if($status) {
                $this->session->set_flashdata('session_message', 'Location Saved Successfully!');
                $this->session->set_flashdata('session_status', true);
            }
            else {
                $this->session->set_flashdata('session_message', 'Location Cannot Be Saved!');
                $this->session->set_flashdata('session_status', false);
            }

            $this->index();

        }

	}

}
