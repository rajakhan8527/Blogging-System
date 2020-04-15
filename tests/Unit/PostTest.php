<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertDatabaseHas('posts', ['title'=>'Android Tutorials',]);
        //$this->assertTrue(true);

        // $res = $this->get('/admin/bloguser/post/create/{id}');
        // $res->assertStatus(200);

    }
}
