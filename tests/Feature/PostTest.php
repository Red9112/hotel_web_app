<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Illuminate\Support\Str;

use Tests\TestCase;

class PostTest extends TestCase
{
 use RefreshDatabase;
    public function test_SavePost()
    {
    $post=new Post();
    $post->title='this is a test title';
    $post->description='test description';
    $post->slug=Str::slug($post->description, '-');
    $post->active=false;
    $post->save();

    /*$this->assertDatabaseMissing('posts',[
        'title'=>'this is a test title',
        'description'=>'test description',
    ]);*/
    $this->assertDatabaseHas('posts',[
        'title'=>'this is a test title',
        'description'=>'test description',
    ]);
    }
    public function test_SavePostt()
    {
        $this->assertDatabaseMissing('posts',[
            'title'=>'this is a test title',
        'description'=>'test description',
        ]);}

        public function test_PostStoreValid(){

            $data=[
                'title'=>'test Post Store',
                'description'=>'test descr',
                'slug'=>Str::slug('title', '-'),
                'active'=>false
            ];
            $this->post('/posts',$data)
            ->assertStatus(302)
            ->assertSessionHas('status');
            $this->assertEquals(session('status'),'a post was created');

        }


        public function test_PostStoreFail(){

            $data=[
                'title'=>'',
                'description'=>'',   
            ];
            $this->post('/posts',$data)
            ->assertStatus(302)
            ->assertSessionHas('errors');
            $messages=session('errors')->getMessages();
            //dd($messages);
            $this->assertEquals($messages['title'][0],'The title must be at least 4 characters.');
            $this->assertEquals($messages['title'][1],'The title field is required.');
            $this->assertEquals($messages['description'][0],'The description field is required.');
        
    
        }
        public function test_PostUpdate(){

            $post=new Post();
            $post->title='Update test title';
            $post->description='Update test description';
            $post->slug=Str::slug($post->title, '-');
            $post->active=true;
            $post->save();
        

            $this->assertDatabaseHas('posts',$post->toarray());
            $data=[
                'title'=>'Updated Post Store',
                'slug'=>Str::slug('Updated Post Store', '-'),
                'description'=>'test descr',
                'active'=>false
            ];
            $this->put("/posts/{$post->id}",$data)
            ->assertStatus(302)
            ->assertSessionHas('status');
            $this->assertEquals(session('status'),'The post was updated !!');
            $this->assertDatabaseHas('posts',[
                'title'=>$data['title'] ]);
           
        }

        public function test_PostDelete(){

            $post=new Post();
            $post->title='Delete test title';
            $post->description='dlt test description';
            $post->slug=Str::slug($post->title, '-');
            $post->active=true;
            $post->save();
        
            $this->assertDatabaseHas('posts',$post->toarray());
            $this->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');
            $this->assertDatabaseMissing('posts',$post->toarray());
        }

}
