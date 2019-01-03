<?php

class Model_Bird_Wiki extends CI_Model {

    public function get_few_birds() {

        $query = $this->db->query("SELECT bird.birdId, bird.comName, bird.sciName, bird.image FROM siyothlk.bird ORDER BY bird.birdId DESC LIMIT 8;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function get_full_bird ($birdId) {

        $query = $this->db->query("SELECT bird.birdId, bird.comName, bird.sciName, bird.image, bird.otherName, bird.details, bird.disMapLink FROM siyothlk.bird WHERE bird.birdId = $birdId;");
        return $query->row(0);

    }

    public function get_edit_bird ($birdId) {

        $query = $this->db->query("SELECT bird.birdId, bird.details FROM siyothlk.bird WHERE bird.birdId = $birdId;");
        return $query->row(0);

    }

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

    public function add_edit_bird_admin() {

        $data = array(
            'details' => $this->input->post('details')
        );

        $this->db->where('birdId', $this->input->post('birdId'));
        return $this->db->update('bird', $data);

    }

    public function get_edited_contents() {

        $query = $this->db->query("SELECT bird_user.id, bird_user.birdId, bird_user.details FROM siyothlk.bird_user WHERE bird_user.flag = 'w';");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

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

    public function dismiss_changes($id) {

        $data1 = array(
            'flag' => 'd'
        );

        $this->db->where('id', $id);
        return $this->db->update('bird_user', $data1);

    }

    public function get_bird_list() {

        $query = $this->db->query("SELECT bird.birdId, bird.comName FROM siyothlk.bird;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function delete_bird($birdId) {

        return $this->db->delete('bird', array('birdId' => $birdId));

    }

    public function get_categories() {

        $query = $this->db->query("SELECT category.id, category.name, category.details, category.image FROM siyothlk.category;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function get_full_category($id) {

        $query = $this->db->query("SELECT category.id, category.name, category.image, category.details, bird.birdId, bird.comName, bird.sciName  FROM siyothlk.category JOIN siyothlk.bird_cat ON category.id = bird_cat.catId JOIN siyothlk.bird ON bird_cat.birdId = bird.birdId WHERE category.id = '$id';");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function get_all_birds() {

        $query = $this->db->query("SELECT bird.birdId, bird.comName, bird.sciName FROM siyothlk.bird ORDER BY bird.comName ASC;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }



}