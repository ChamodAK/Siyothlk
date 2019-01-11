<?php

class Model_Bird_Wiki extends CI_Model {

    //get few birds from db to display in bird wiki home page
    public function get_few_birds() {

        $query = $this->db->query("SELECT bird.birdId, bird.comName, bird.sciName, bird.image FROM siyothlk.bird ORDER BY bird.birdId DESC LIMIT 8;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    //get all the details of a bird from db
    public function get_full_bird ($birdId) {

        $query = $this->db->query("SELECT bird.birdId, bird.comName, bird.sciName, bird.image, bird.otherName, bird.details, bird.disMapLink FROM siyothlk.bird WHERE bird.birdId = $birdId;");
        return $query->row(0);

    }

    //get details of a bird which are allowed to edit by a user or admin
    public function get_edit_bird ($birdId) {

        $query = $this->db->query("SELECT  bird.comName , bird.birdId, bird.details FROM siyothlk.bird WHERE bird.birdId = $birdId;");
        return $query->row(0);

    }

    //add edited bird details to the relevant table in the db
    public function add_edit_bird() {

        $data = array(

            'birdId' => $this->input->post('birdId'),
            'userId' => $this->session->userdata('id'),
            'details' => $this->input->post('details'),
            'timeStamp' => date ('Y-m-d H:i:s'),
            'flag' => 'w'

        );

        return $this->db->insert('bird_user', $data);

    }

    //add edited bird details by admin to the database
    public function add_edit_bird_admin() {

        $data = array(
            'details' => $this->input->post('details')
        );

        $this->db->where('birdId', $this->input->post('birdId'));
        return $this->db->update('bird', $data);

    }

    //get bird edited contents which are waiting to be approved by admin
    public function get_edited_contents() {

        $query = $this->db->query("SELECT bird_user.id, bird_user.birdId, bird_user.details FROM siyothlk.bird_user WHERE bird_user.flag = 'w';");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    //update bird wiki tables in database with approved changes
    public function approve_changes($id) {

        $data1 = array(
            'flag' => 'a'
        );

        $this->db->where('id', $id);
        $var1 = $this->db->update('bird_user', $data1);

        $q1 = $this->db->query("SELECT bird_user.birdId FROM siyothlk.bird_user WHERE bird_user.id = $id;");
        $q2 = $this->db->query("SELECT bird_user.details FROM siyothlk.bird_user WHERE bird_user.id = $id;");

        $birdId = $q1->row(0)->birdId;
        $details = $q2->row(0)->details;

        $data2 = array(
            'details' => $details
        );

        $this->db->where('birdId', $birdId);
        $var2 = $this->db->update('bird', $data2);

        $data['var1'] = $var1;
        $data['var2'] = $var2;
        return $data;

    }

    //update database with dismissed changes
    public function dismiss_changes($id) {

        $data1 = array(
            'flag' => 'd'
        );

        $this->db->where('id', $id);
        return $this->db->update('bird_user', $data1);

    }

    //get full bird list in order to be edited a particular bird by admin
    public function get_bird_list() {

        $query = $this->db->query("SELECT bird.birdId, bird.comName FROM siyothlk.bird ORDER BY bird.comName ASC;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    //delete bird from the database
    public function delete_bird($birdId) {

        return $this->db->delete('bird', array('birdId' => $birdId));

    }

    //get all bird categories from database
    public function get_categories() {

        $query = $this->db->query("SELECT category.id, category.name, category.details, category.image FROM siyothlk.category;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    //get all the details of a particular bird category
    public function get_full_category($id) {

        $query = $this->db->query("SELECT category.id, category.name, category.image, category.details, bird.birdId, bird.comName, bird.sciName  FROM siyothlk.category JOIN siyothlk.bird_cat ON category.id = bird_cat.catId JOIN siyothlk.bird ON bird_cat.birdId = bird.birdId WHERE category.id = '$id';");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    //get list of all the birds in the bird table
    public function get_all_birds() {

        $query = $this->db->query("SELECT bird.birdId, bird.comName, bird.sciName FROM siyothlk.bird ORDER BY bird.comName ASC;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    //get distribution map of a particular bird
    public function get_bird_map($id)
    {
        $query = $this->db->query("SELECT  birdId , comName , disMapLink FROM bird WHERE birdId = $id");

        return $query->row(0);
    }

    //get advanced search results from db when one colour selected
    public function advanced_search($size, $colour, $location) {

        $query = $this->db->query("SELECT bird.birdId, bird.comName, bird.sciName, bird.image FROM siyothlk.bird JOIN siyothlk.bird_colour ON bird.birdId = bird_colour.birdId JOIN siyothlk.bird_loc ON bird.birdId = bird_loc.birdId WHERE bird.size = '$size' AND bird_colour.colour = '$colour' AND bird_loc.location = '$location';");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else {

            $data = array();

            $query = $this->db->query("SELECT DISTINCT bird.birdId, bird.comName, bird.sciName, bird.image FROM siyothlk.bird JOIN siyothlk.bird_colour ON bird.birdId = bird_colour.birdId JOIN siyothlk.bird_loc ON bird.birdId = bird_loc.birdId WHERE bird.size = '$size' AND (bird_colour.colour = '$colour' OR bird_loc.location = '$location');");

            if($query->num_rows()>0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }

        }

    }

    //get advanced search results from db when two colours selected
    public function advanced_search_2($size, $colour1, $colour2, $location) {

        $query = $this->db->query("SELECT DISTINCT bird.birdId, bird.comName, bird.sciName, bird.image FROM siyothlk.bird JOIN siyothlk.bird_colour ON bird.birdId = bird_colour.birdId JOIN siyothlk.bird_loc ON bird.birdId = bird_loc.birdId WHERE bird.size = '$size' AND (bird_colour.colour = '$colour1' AND bird_colour.birdId IN (SELECT bird_colour.birdId FROM siyothlk.bird_colour WHERE bird_colour.colour = '$colour2')) AND bird_loc.location = '$location';");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else {

            $query = $this->db->query("SELECT DISTINCT bird.birdId, bird.comName, bird.sciName, bird.image FROM siyothlk.bird JOIN siyothlk.bird_colour ON bird.birdId = bird_colour.birdId JOIN siyothlk.bird_loc ON bird.birdId = bird_loc.birdId WHERE bird.size = '$size' AND (bird_colour.colour = '$colour1' AND bird_colour.birdId IN (SELECT bird_colour.birdId FROM siyothlk.bird_colour WHERE bird_colour.colour = '$colour2') OR bird_loc.location = '$location');");

            if($query->num_rows()>0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }

        }

    }

    //add new bird to the database
    public function add_new_bird() {

        $comName = $this->input->post('comName');
        $sciName = $this->input->post('sciName');
        $otherName = $this->input->post('otherName');
        $size = $this->input->post('size');
        $category = $this->input->post('category');
        $colour1 = $this->input->post('colour1');
        $colour2 = $this->input->post('colour2');
        $location1 = $this->input->post('location1');
        $location2 = $this->input->post('location2');
        $location3 = $this->input->post('location3');
        $map = $this->input->post('map');
        $details = $this->input->post('details');
        $imgName = $this->input->post('imgName');;

        $bird = array(

            'comName' => $comName,
            'sciName' => $sciName,
            'details' => $details,
            'disMapLink' => $map,
            'image' => $imgName,
            'size' => $size

        );

        if(!empty($otherName)) {
            $bird['otherName'] = $otherName;
        }

        //insert new bird to the bird table
        if($this->db->insert('bird', $bird)) {

            $query = $this->db->query("SELECT bird.birdId FROM siyothlk.bird WHERE bird.sciName = '$sciName';");
            $birdId = $query->first_row()->birdId;

            //inserting record to bird_cat table
            $bird_cat = array(
                'birdId' => $birdId,
                'catId' => $category
            );
            $this->db->insert('bird_cat', $bird_cat);

            //inserting records to bird_loc table
            if(empty($location2) && empty($location3)) {
                $bird_loc = array(
                    'birdId' => $birdId,
                    'location' => $location1
                );
                $this->db->insert('bird_loc', $bird_loc);
            }
            elseif (empty($location3)) {
                $bird_loc1 = array(
                    'birdId' => $birdId,
                    'location' => $location1
                );
                $this->db->insert('bird_loc', $bird_loc1);

                $bird_loc2 = array(
                    'birdId' => $birdId,
                    'location' => $location2
                );
                $this->db->insert('bird_loc', $bird_loc2);
            }
            else {
                $bird_loc1 = array(
                    'birdId' => $birdId,
                    'location' => $location1
                );
                $this->db->insert('bird_loc', $bird_loc1);

                $bird_loc2 = array(
                    'birdId' => $birdId,
                    'location' => $location2
                );
                $this->db->insert('bird_loc', $bird_loc2);

                $bird_loc3 = array(
                    'birdId' => $birdId,
                    'location' => $location3
                );
                $this->db->insert('bird_loc', $bird_loc3);

            }

            //inserting records to bird_colour table
            if(empty($colour2)) {
                $bird_colour = array(
                    'birdId' => $birdId,
                    'colour' => $colour1
                );
                $this->db->insert('bird_colour', $bird_colour);
            }
            else {
                $bird_colour1 = array(
                    'birdId' => $birdId,
                    'colour' => $colour1
                );
                $this->db->insert('bird_colour', $bird_colour1);

                $bird_colour2 = array(
                    'birdId' => $birdId,
                    'colour' => $colour2
                );
                $this->db->insert('bird_colour', $bird_colour2);
            }

            return TRUE;

        }
        else {

            return FALSE;

        }
    }



}