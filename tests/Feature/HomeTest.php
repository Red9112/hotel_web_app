<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    
    public function test_HomePage()
    {
        $response = $this->get('/home');
        $response->assertSeeText('home page');
        $response->assertSeeText('this a paragraph in home page');
    }
    public function test_AboutPage()
    {
        $response = $this->get('/about');
        $response->assertSeeText('about page');
    }
}
