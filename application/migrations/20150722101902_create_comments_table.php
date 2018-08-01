<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_comments_table extends CI_Migration
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
            'text' => array(
                'type' => 'TEXT'
            ),
            'parent_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'application_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'site' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'created_at' => array('type' => 'timestamp'),
            'updated_at' => array('type' => 'timestamp')

        );

        $this->dbforge->add_field('CONSTRAINT fk_users_id FOREIGN KEY (user_id) REFERENCES users(id)');
        $this->dbforge->add_field('CONSTRAINT fk_applications_id FOREIGN KEY (application_id) REFERENCES applications(id)');

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('comments', TRUE);

    }

    public function down()
    {
        $this->dbforge->drop_table('comments');
    }
}