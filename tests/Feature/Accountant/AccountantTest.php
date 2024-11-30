<?php

namespace Tests\Feature\Accountant;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Modules\Accountant\Models\Accountant;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\Admin\Models\Admin;
use Tests\TestCase;

class AccountantTest extends TestCase
{

    use DatabaseTransactions;

    public function test_showall(): void
    {
        $accountant = Accountant::factory()->create();
        $response = $this->get('api/accountants/showall');
        $response->assertStatus(200);
    }

    public function test_show(){
        $accountant = Accountant::factory()->create();
        $response = $this->getJson('/api/accountants/show/'.$accountant->id);
        $response->assertStatus(200);
    }



    public function test_store() {
        $file = UploadedFile::fake()->image('photo.jpg');
        $data = [
            'name' => 'ahmed',
            'email' => 'unique_email_' . time() . '@gmail.com',
            'phone' => '0125458778',
            'status' => 'activated',
            'country' => 'fayoum',
            'academic_qualification' => 'BA',
            'certificate' => $file,
            'user_id' => 1,
            'admin_id' => 1,
        ];

        $response = $this->postJson('/api/accountants/store', $data);

        // dd($response->json());

        $response->assertStatus(201);
        $this->assertDatabaseHas('accountants', [
            'name' => 'ahmed',
            'email' => $data['email'],
            'phone' => '0125458778',
            'status' => 'activated',
            'country' => 'fayoum',
            'academic_qualification' => 'BA',
            'user_id' => 1,
            'admin_id' => 1,
        ]);
    }



    public function test_update(){
        $file = UploadedFile::fake()->image('photo.jpg');
        $user = User::factory()->create();
        $admin = Admin::factory()->create();

        $accountant = Accountant::factory()->create([
            'user_id' => $user->id,
            'admin_id' => $admin->id,
            'email' => 'unique_email_' . time() . '@gmail.com',
        ]);

        $data = [
            'name' => 'ahmed',
            'email' => 'another_unique_email_' . time() . '@gmail.com',
            'phone' => '0125458778',
            'status' => 'activated',
            'country' => 'fayoum',
            'academic_qualification' => 'BA',
            'certificate' => $file,
            'user_id' => $user->id,
            'admin_id' => $admin->id,
        ];

        $response = $this->postJson('/api/accountants/update/' . $accountant->id, $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('accountants', [
            'id' => $accountant->id,
            'name' => 'ahmed',
            'email' =>  $data['email'],
            'phone' => '0125458778',
            'status' => 'activated',
            'country' => 'fayoum',
            'academic_qualification' => 'BA',
            'user_id' => $user->id,
            'admin_id' => $admin->id,
        ]);
    }

    public function test_delete(){
        $accountant = Accountant::factory()->create();
        $response = $this->delete('/api/accountants/destroy/'.$accountant->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('accountants',['id'=>$accountant->id]);
    }


}
