<?php

namespace Tests\Feature\Comment;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Modules\Author\Models\Author;
use Modules\Blogs\Models\Blog;
use Modules\Comments\Models\Comment;
use Tests\TestCase;

class CommentTest extends TestCase
{

    use DatabaseTransactions;


    public function test_showall(){

        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');

        $comment = Comment::factory()->create();
        $response =$this->getJson('api/comments/showall');
        $response->assertStatus(200);
    }

    public function test_show(){

        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');

        $comment = Comment::factory()->create();
        $response = $this->getJson('/api/comments/show/'.$comment->id);
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
        $author = Author::factory()->create();
        $blog = Blog::factory()->create();
        $comment = Comment::factory()->create();

        $data = [
            'commentable_type' => 'Modules\Blogs\Models\Blog',
            'commentable_id' => $blog->id,
            'content' => 'Welcome',
            'blog_id' => $blog->id,
            'author_id' => $author->id,
            'parent_id' => $comment->id,
        ];

        $response = $this->postJson('api/comments/store', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('comments', [
            'commentable_type' => 'Modules\Blogs\Models\Blog',
            'commentable_id' => $blog->id,
            'content' => 'Welcome',
            'blog_id' => $blog->id,
            'author_id' => $author->id,
            'parent_id' => $comment->id,
        ]);
    }

    public function test_update(){
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
        $author = Author::factory()->create();
        $blog = Blog::factory()->create();
        $comment = Comment::factory()->create();

        $data = [
            'commentable_type' => 'Modules\Blogs\Models\Blog',
            'commentable_id' => $blog->id,
            'content' => 'Welcome',
            'blog_id' => $blog->id,
            'author_id' => $author->id,
            'parent_id' => $comment->id,
        ];

        $response = $this->putJson('/api/comments/update/'.$comment->id, $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('comments', [
            'commentable_type' => 'Modules\Blogs\Models\Blog',
            'commentable_id' => $blog->id,
            'content' => 'Welcome',
            'blog_id' => $blog->id,
            'author_id' => $author->id,
            'parent_id' => $comment->id,
        ]);
    }


    public function test_delete(){
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
        $comment = Comment::factory()->create();
        $response = $this->delete('/api/comments/destroy/'.$comment->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comments',['id'=>$comment->id]);
    }



}
