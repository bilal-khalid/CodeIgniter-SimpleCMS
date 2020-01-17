<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends CI_Controller
{
    public function index()
    {
        $this->load->library('migration');

        if ($this->migration->current() === false) {
            show_error($this->migration->error_string());
        } else {
            if ($this->input->get('seed') === 'true') {
                $this->seeder();
            }
            echo 'Migrations ran successfully!';
        }
    }

    private function seeder()
    {
        $this->load->model('Article');
        $this->load->model('Category');
        $this->load->model('User');

        $faker = Faker\Factory::create();

        $this->db->insert_batch('groups', [
            ['name' => 'Admins'],
            ['name' => 'Users']
        ]);

        $this->db->insert_batch('settings', [
            ['key' => 'site_title', 'value' => 'SimpleCMS'],
            ['key' => 'site_description', 'value' => 'A Simple CMS Powered by CodeIgniter'],
            ['key' => 'logo', 'value' => 'mylogo.jpg'],
            ['key' => 'featured_heading', 'value' => 'SimpleCMS'],
            ['key' => 'featured_text', 'value' => 'A Simple CMS Powered by CodeIgniter']
        ]);

        $this->User->insert([
            'first_name' => 'Site',
            'last_name' => 'Admin',
            'username' => 'siteadmin',
            'email' => 'site.admin@example.com',
            'password' => 'simplepassword',
            'group_id' => 1
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $this->Category->insert([
                'name' => ucwords($faker->unique()->sentence(2, true))
            ]);

            $categoryId = $this->db->insert_id();

            for ($j = 0; $j < 5; $j++) {
                $this->User->insert([
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'username' => preg_replace('/[^a-zA-Z0-9]/','', $faker->unique()->userName),
                    'email' => $faker->safeEmail,
                    'password' => 'password',
                    'group_id' => 2
                ]);

                $userId = $this->db->insert_id();

                $this->Article->insert([
                    'category_id' => $categoryId,
                    'user_id' => $userId,
                    'title' => $faker->sentence,
                    'body' => $faker->paragraphs(10, true),
                    'access' => 0,
                    'is_published' => 1
                ]);
            }
        }
    }
}
