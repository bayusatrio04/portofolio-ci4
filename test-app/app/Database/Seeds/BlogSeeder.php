<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BlogSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $faker = \Faker\Factory::create();
            $data = [
                'blog_title' => $faker->userName,
                'blog_description'    => $faker->email,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
            $this->db->table('blog')->insert($data);
        }
        // $faker = Faker\Factory::create();
        // $data = [
        //     'blog_title' => 'Informasi terbaru 2024',
        //     'blog_description'    => 'Informasi adalah serangkaian data yang akan disebarkan atau yang didapatkan dari berbagai sumber',
        // ];

        // Simple Queries
        $this->db->query('INSERT INTO blog (blog_title, blog_description) VALUES(:blog_title:, :blog_description:)', $data);

        // Using Query Builder
        $this->db->table('blog')->insert($data);
    }
}
