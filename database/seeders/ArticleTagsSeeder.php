<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticleTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => str_random(10),
        ]);
        DB::table('articles_tags')->insert([
            'articles_id' => str_random(10),
            'tags_id' => bcrypt('secret'),
        ]);
    }
}
