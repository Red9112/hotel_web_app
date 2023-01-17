<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts=\App\Models\Post::all();
        $nbComments=(int)$this->command->ask("How many  comment you want generate ?",5);
       \App\Models\Comment::factory($nbComments)->make()->each(function($comment) use($posts){
            $comment->post_id=$posts->random()->id;
            $comment->save();
    });
}
}