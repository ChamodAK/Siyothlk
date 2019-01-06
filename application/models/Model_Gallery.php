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

    public function add_new_image($image_data){

        $birdname = $this->input->post('birdname');
        $query = $this->db->query("SELECT birdId FROM bird WHERE comName = '$birdname'");
        $birdId = $query->row()->birdId;

        $data = array(

            'bird_id' => $birdId,
            'timeStamp' => date ('Y-m-d H:i:s'),
            'link' => $image_data['image'],
            'userId' => $this->session->userdata('id')

        );

        return $this->db->insert('image', $data);
    }




}