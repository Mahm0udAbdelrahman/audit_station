<?php

namespace Tests\Feature\SubCategory;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\Category\Models\Category;
use Modules\SubCategory\Models\SubCategory;

class SubCategoryTest extends TestCase
{

    use DatabaseTransactions;


    public function test_showall(): void
    {
        $sub = SubCategory::factory()->create();
        $response = $this->get('api/sub_categories/showall');
        $response->assertStatus(200);
    }

    public function test_show(){

        $sub_categories = SubCategory::factory()->create();
        $response = $this->get('api/sub_categories/show/'.$sub_categories->id);
        $response->assertStatus(200);
        $data = $response->json();
    }

    public function test_store(){

        $category = Category::factory()->create();

        $data = [
            'name' => 'new category',
            'category_id' => $category->id,
        ];

        $response = $this->postJson('/api/sub_categories/store', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('sub_categories', [
            'name' => 'new category',
            'category_id' => $category->id,
        ]);
    }

    public function test_update()
    {
        $category = SubCategory::factory()->create([
            'name' => 'Old Name',
        ]);

        $data = [
            'name' => 'Updated Category',
            'category_id' => $category->category_id,
        ];

        $response = $this->putJson('/api/sub_categories/update/' . $category->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('sub_categories', [
            'id' => $category->id,
            'name' => 'Updated Category', 
        ]);
    }

}
