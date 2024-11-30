<?php

namespace Tests\Feature\Author;

// use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Author\Models\Author;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AuthorTest extends TestCase
{

    use DatabaseTransactions;

    public function test_example(): void
    {
        $author = Author::factory()->create();
        $response = $this->get('api/authors/showall');
        $response->assertStatus(200);
    }

    public function test_show(){
        $author = Author::factory()->create();
        $response = $this->getJson('/api/authors/show/'.$author->id);
        $response->assertStatus(200);
    }

    public function test_store(){

        $file = UploadedFile::fake()->image('photo.jpg');
        $author = Author::factory()->create();
        $data = [
            'photo' =>$file,
            'name'=>'ahmed',
            'title'=>'hello'
        ];
        $response = $this->postJson('api/authors/store',$data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('authors',[
            'name'=>$data['name'],
            'title' =>$data['title'],
        ]);

    }

    public function test_update(){
        $file = UploadedFile::fake()->image('photo.jpg');
        $author = Author::factory()->create();
        $data = [
            'photo' =>$file,
            'name'=>'ahmed',
            'title'=>'hello'
        ];
        $response = $this->postJson('/api/authors/update/'.$author->id,$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('authors',[
            'name'=>$data['name'],
            'title' =>$data['title'],
        ]);
    }


}
