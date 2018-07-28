<?php

class Apps_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct(); // construct the Model class
        $this->load->database();
    }

    public function get_apps($type)
    {
        $this->db->where('type', $type);
        return $this->db->get("applications");
    }

}
