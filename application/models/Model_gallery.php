<?php

class Model_gallery extends CI_Model
{

    public function get_photo (){

        $query = $this->db->query("SELECT * FROM siyothlk.image ORDER BY image.timeStamp DESC ;");

        if($query->num_rows()>0 ){
            foreach($query->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }

    public function insert_photo(){
        echo "done";


        $mapimg=0;
        $galimg=0;
        if($this->input->post('rad',true)==='map_image'){
            $mapimg=1;
        }else{
            $galimg=1;
        }
        $data = array(

            'name' => $this->input->post('name', TRUE),
            'link' => $this->input->post('photo', TRUE),
            'timeStamp'=> date ('Y-m-d H:i:s'),
            'latitude'=> 1,
            'longitude'=> 1,
            'mapImage'=>$mapimg,
            'galImage'=>$galimg,
            'userId'=> $this->session->userdata('id')
        );
        echo "done";

        return $this->db->insert('image', $data);
        echo "done";

    }
}