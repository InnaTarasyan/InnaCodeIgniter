<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_apps_table extends CI_Migration
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
                'constraint' => 100,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'desc' => array(
                'type' => 'TEXT'
            ),
            'img' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'type' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'download_count' => array(
                'type' => 'INT',
                'default' => 0
            )

        );

//        $this->dbforge->add_field('CONSTRAINT fk_id FOREIGN KEY (user_id) REFERENCES users(id)');

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('applications', TRUE);

    }

    public function down()
    {
        $this->dbforge->drop_table('applications');
    }
}