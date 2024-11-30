<?php

namespace Tests\Feature\AboutUs;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\AboutUs\Models\AboutUs;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AboutUsTest extends TestCase
{

    use DatabaseTransactions;

    public function test_showall(): void
    {
        $about = AboutUs::factory()->create();
        $response = $this->get('api/about_us/showall');
        $response->assertStatus(200);
    }

    public function test_show(){
        $about = AboutUs::factory()->create();
        $response = $this->get('/api/about_us/show/'.$about->id);
        $response->assertStatus(200);
    }

    public function test_store(){
        $file = UploadedFile::fake()->image('photo.jpg');
        $about = AboutUs::factory()->create();
        $data = [
            'photo' => $file,
            'description'=>'Hello',
            'YouTube_Link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'
        ];
        $response = $this->postJson('/api/about_us/store',$data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('about_us',[
        //  وذلك لان ال About-Us لايوجد بها عمود للصوره فى ال Database
            'description'=>$data['description'],
            'YouTube_Link' =>$data['YouTube_Link'],
        ]);
    }

    public function test_update(){
        $file = UploadedFile::fake()->image('photo.jpg');
        $about = AboutUs::factory()->create();
        $data = [
            'photo' => $file,
            'description'=>'Hello',
            'YouTube_Link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'
        ];
        $response = $this->postJson('/api/about_us/update/' .$about->id ,$data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('about_us',[
        //  وذلك لان ال About-Us لايوجد بها عمود للصوره فى ال Database
            'description'=>$data['description'],
            'YouTube_Link' =>$data['YouTube_Link'],
        ]);
    }



}
