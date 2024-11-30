<?php

namespace Tests\Feature\Blog;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Modules\Author\Models\Author;
use Modules\Blogs\Models\Blog;
use Modules\Category\Models\Category;
use Modules\SubCategory\Models\SubCategory;
use Tests\TestCase;

class BlogTest extends TestCase
{

    use DatabaseTransactions;

    public function test_showall(): void
    {
        $blog = Blog::factory()->create();
        $response = $this->get('api/blogs/showall');
        $response->assertStatus(200);
    }

    public function test_show(){
        $blog = Blog::factory()->create();
        $response = $this->getJson('/api/blogs/show/'.$blog->id);
        $response->assertStatus(200);
    }

    public function test_store(){
       $file = UploadedFile::fake()->image('photo.jpg');
       $category = Category::factory()->create();
       $subCategory = SubCategory::factory()->create(['category_id' => $category->id]);
       $author = Author::factory()->create();
       $data = [
           'photo' => $file,
           'title'=>'hello',
           'description'=>'welcome welcome',
           'share'=>'https://www.micro.com',
           'tags'=>'https://www.micro.com',
           'category_id' => $category->id,
           'author_id' => $author->id,
           'sub_category_id' => $subCategory->id,
       ];

       $response = $this->postJson('api/blogs/store',$data);
       $response->assertStatus(201);
       $this->assertDatabaseHas('blogs',[
        'title'=>'hello',
        'description'=>'welcome welcome',
        'share'=>'https://www.micro.com',
        'tags'=>'https://www.micro.com',
        'category_id' => $category->id,
        'author_id' => $author->id,
        'sub_category_id' => $subCategory->id,
       ]);
    }


    public function test_update(){
        $file = UploadedFile::fake()->image('photo.jpg');
        $category = Category::factory()->create();
        $subCategory = SubCategory::factory()->create(['category_id' => $category->id]);
        $author = Author::factory()->create();
        $blog = Blog::factory()->create();
        $data = [
            'photo' => $file,
            'title'=>'hello',
            'description'=>'welcome welcome',
            'share'=>'https://www.micro.com',
            'tags'=>'https://www.micro.com',
            'category_id' => $category->id,
            'author_id' => $author->id,
            'sub_category_id' => $subCategory->id,
        ];

        $response = $this->postJson('/api/blogs/update/'.$blog->id,$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('blogs',[
         'title'=>'hello',
         'description'=>'welcome welcome',
         'share'=>'https://www.micro.com',
         'tags'=>'https://www.micro.com',
         'category_id' => $category->id,
         'author_id' => $author->id,
         'sub_category_id' => $subCategory->id,
        ]);
     }

}
