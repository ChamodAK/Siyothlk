<?php 

class Model_Pic_Map extends CI_Model {

    // Get all the entries from table
    public function get_all_locations() {

        $query = $this->db->get('pic_map');
        return $query->result();

    }

    // Insert an location to the DB
    public function insert_location($location, $path) {

        $data = array(
                'image_link' => $path,
                'location' => $location
        );
        
        $this->db->insert('pic_map', $data);

        return $this->db->affected_rows() > 0;

    }

}