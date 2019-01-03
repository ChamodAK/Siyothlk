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

    public function bird_list(){
        $data=array();
        $query= $this->db->query("SELECT comName FROM siyothlk.bird ;");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }

        }
        return $data;

    }

    public function cat_list(){
        $data=array();
        $query= $this->db->query("SELECT id,name,details FROM siyothlk.category ;");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }

        }
        return $data;

    }

    public function insert_photo($img_data){
        echo "done1";


        $mapimg=0;
        $galimg=0;
        if($this->input->post('rad',true)==='map_image'){
            $mapimg=1;
        }else{
            $galimg=1;
        }
        $data = array(

            'name' => $this->input->post('bird', TRUE),
            'link' => $img_data,
            'timeStamp'=> date ('Y-m-d H:i:s'),
            'latitude'=> $this->input->get('lat',True),
            'longitude'=> $this->input->get('lng',True),
            'mapImage'=>$mapimg,
            'galImage'=>$galimg,
            'userId'=> $this->session->userdata('id')
        );
        echo $data['longitude'];

        return $this->db->insert('image', $data);
        echo "done2";

    }




}