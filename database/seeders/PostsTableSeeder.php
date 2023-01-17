<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=\App\Models\User::all();
        if($users->count()==0){
            $this->command->info("please create some users");
            return;
        }
        $nbPosts=(int)$this->command->ask("How many  post you want generate ?",10);
     \App\Models\Post::factory( $nbPosts)->make()->each(function($post) use($users){
            $post->user_id=$users->random()->id;
            $post->save();
        });
    }
}
