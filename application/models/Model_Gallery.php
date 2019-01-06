<?php

class Model_gallery extends CI_Model
{

    public function get_images (){

        $query = $this->db->query("SELECT * FROM siyothlk.image JOIN siyothlk.bird ON image.bird_id = bird.birdId ORDER BY image.timeStamp DESC ;");

        if($query->num_rows()>0 ){
            foreach($query->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }

    public function get_bird_names(){
        $data=array();
        $query= $this->db->query("SELECT comName FROM siyothlk.bird ;");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }

        }
        return $data;

    }

    public function get_bird_categories(){
        $data=array();
        $query= $this->db->query("SELECT id,name,details FROM siyothlk.category ;");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }

        }
        return $data;

    }

    public function add_new_image(){

        $birdname = $this->input->post('birdname');
        $content = $this->input->post('content');
        $lat = $this->input->get('lat');
        $lng = $this->input->get('lng');


        $data = array(

            'image_name' => $birdname,
            'content' => $this->input->post('content'),
            'lat' => $lat,
            'lng' => $lng
            //'timeStamp' => date ('Y-m-d H:i:s'),
            //'link' => $image_data['image'],
            //'userId' => $this->session->userdata('id')

        );

        return $this->db->insert('map_image', $data);
    }




}