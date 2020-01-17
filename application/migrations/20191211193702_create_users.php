<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Users extends CI_Migration
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
                'first_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ],
                'last_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ],
                'username' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ],
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255'
                ],
                'group_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true
                ],
                'created TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
            ]
        );

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}
