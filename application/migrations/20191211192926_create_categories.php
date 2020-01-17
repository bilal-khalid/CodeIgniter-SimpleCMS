<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Categories extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(
            [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ],
                'created TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
            ]
        );

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('categories');
    }

    public function down()
    {
        $this->dbforge->drop_table('categories');
    }
}
