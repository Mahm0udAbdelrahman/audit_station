<?php

namespace Tests\Feature\Ad;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Ads\Models\Ad;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdsTest extends TestCase
{


    use DatabaseTransactions;

    public function test_index(): void
    {
        $ads = Ad::factory()->create();
        $response = $this->get('api/ads/showall');
        $response->assertStatus(200);
    }

    public function test_show(){
        $ads = Ad::factory()->create();
        $response = $this->getJson('/api/ads/show/'.$ads->id);
        $response->assertStatus(200);
    }

    public function test_store(){
        $file = UploadedFile::fake()->image('photo.jpg');
        $ads = Ad::factory()->create();
        $data = [
            'photo' => $file,
            'title'=> 'water',
            'description'=>'Hello',
            'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'
        ];
        $response = $this->postJson('api/ads/store',$data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('ads',[
           'title'=>$data['title'],
           'description'=>$data['description'],
           'link'=>$data['link'],
        ]);
    }

    public function test_update(){
        $file = UploadedFile::fake()->image('photo.jpg');
        $ads = Ad::factory()->create();
        $data = [
           'photo' =>$file,
           'title'=> 'water',
           'description' => 'Hello',
           'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'
        ];
        $response = $this->postJson('/api/ads/update/'.$ads->id ,$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('ads',[
            'title'=>$data['title'],
            'description'=>$data['description'],
           'link'=>$data['link'],
        ]);
    }

    public function test_delete(){
        $ads = Ad::factory()->create();
        $response = $this->delete('/api/ads/destroy/'.$ads->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('ads',['id'=>$ads->id]);
    }
}
