<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Menu Navigation model
 *
 * @author		Liran Tal <liran.tal@gmail.com>
 * @package		daloRADIUS
 * @subpackage	Menu Navigation module for CodeIgniter
 * @copyright	GPLv2
 *
 */
class Menu_m extends CI_Model {


    public function __construct()
    {
        parent::__construct();

    }


    public function insert_menus($menus){
        $this->db->from('menus');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        if($rowcount == 0) {
            foreach ($menus as $menu){
                $this->db->insert('menus', $menu);
            }
        }
    }

    public function get_menus(){

        if ($this->db->table_exists('menus')){
            $this->db->select('*');
            $this->db->from('menus');
            $this->db->where('parent', 0);

            $parent = $this->db->get();

            $menus = $parent->result();
            $i=0;
            foreach($menus as $p_menu){

                $menus[$i]->sub = $this->sub_menus($p_menu->id);
                $i++;
            }
            return $menus;
        }

    }

    public function sub_menus($id){

        if ($this->db->table_exists('menus')){
            $this->db->select('*');
            $this->db->from('menus');
            $this->db->where('parent', $id);

            $child = $this->db->get();
            $menus = $child->result();
            $i=0;
            foreach($menus as $p_menu){

                $menus[$i]->sub = $this->sub_menus($p_menu->id);
                $i++;
            }
            return $menus;
        }
    }


}