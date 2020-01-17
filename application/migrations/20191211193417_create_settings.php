<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Settings extends CI_Migration
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
                'key' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255'
                ],
                'value' => [
                    'type' => 'TEXT'
                ]
            ]
        );

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('settings');
    }

    public function down()
    {
        $this->dbforge->drop_table('settings');
    }
}
