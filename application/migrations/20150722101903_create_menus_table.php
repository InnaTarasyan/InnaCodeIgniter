<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_menus_table extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 200,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'path' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'parent' => array(
                'type' => 'INT'
            ),
            'created_at' => array('type' => 'timestamp'),
            'updated_at' => array('type' => 'timestamp')

        );


        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('menus', TRUE);

    }

    public function down()
    {
        $this->dbforge->drop_table('menus');
    }
}