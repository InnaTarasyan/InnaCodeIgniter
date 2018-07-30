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

    public function get_app($id){
        $this->db->where('id', $id);
        return $this->db->get("applications")->row();
    }

    public function get_app_comments($id)
    {
        $this->db->select('*')
            ->where('application_id', $id);
      //  $this->db->group_by('parent_id');
        $query = $this->db->get('comments');

        return $query->result_array();

    }

    public function add_comment($data){
        $this->db->insert('comments', $data);

        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }
}
