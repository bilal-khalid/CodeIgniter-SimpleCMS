<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Articles extends CI_Migration
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
                'category_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true
                ],
                'user_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true
                ],
                'title' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255'
                ],
                'body' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'access' => [
                    'type' => 'INT',
                    'constraint' => 4,
                    'unsigned' => true,
                    'default' => 0
                ],
                'is_published' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'unsigned' => true,
                    'default' => 1
                ],
                'created TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
            ]
        );

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('articles');
    }

    public function down()
    {
        $this->dbforge->drop_table('articles');
    }
}
