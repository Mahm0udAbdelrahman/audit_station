<?php

namespace Tests\Feature\Category;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Modules\Category\Models\Category;
use Tests\TestCase;


class CategoryTest extends TestCase
{
    // لا تزيل الداتا
    use DatabaseTransactions;

  public function test_showall(): void
    {
        $categories = Category::factory()->create();
        $response = $this->get('api/categories/showall');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $category = Category::factory()->create();
        $response = $this->get('api/categories/show/' . $category->id);
        $response->assertStatus(200);
        $data = $response->json();
        // dd($data);
        $response->assertJsonStructure([
            'id',
            'name'
        ]);
    }

    public function test_store()
    {
        $data = [
            'name' => 'New Category',
            'photo' => UploadedFile::fake()->image('photo.jpg'),
        ];
        $response = $this->postJson('/api/categories/store', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('categories', ['name' => 'New Category']);
    }

    public function test_update()
    {
        $category = Category::factory()->create();
        $data = [
            'name' => 'Updated Category',
            'photo' => UploadedFile::fake()->image('photo.jpg'),
        ];

        $response = $this->post('api/categories/update/' . $category->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'Updated Category']);
    }

    public function test_delete()
    {
        $category = Category::factory()->create();
        $response = $this->delete('api/categories/destroy/' . $category->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
