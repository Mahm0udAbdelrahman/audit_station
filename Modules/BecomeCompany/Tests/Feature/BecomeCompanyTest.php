<?php

namespace Tests\Feature\BecomeCompany;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Modules\BecomeCompany\Models\BecomeCompany;
use Tests\TestCase;

class BecomeCompanyTest extends TestCase
{

    use DatabaseTransactions;

    public function test_example(): void
    {
        $become = BecomeCompany::factory()->create();
        $response = $this->get('api/become_companies/showall');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $become = BecomeCompany::factory()->create();
        $response = $this->getJson('/api/become_companies/show/' . $become->id);
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $data = [
            'company_name' => 'Micro Soft',
            'owner_name' => 'Ahmed',
            'email' => 'unique_email_' . time() . '@gmail.com',
            'phone' => '1234567890',
            'company_address' => '1234 Elm Street',
            'company_work' => 'Software Development',
            'position_in_company' => 'CEO',
            'company_headquarter' => 'Cairo',
            'company_logo' => UploadedFile::fake()->image('logo.png'),
            'license_and_tex_infomation' => UploadedFile::fake()->image('license.png'),
            'status' => 'waitting',
            'show' => true,
            'user_id' => 1,
        ];

        $response = $this->postJson('api/become_companies/store', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('become_companies', [
            'company_name' => 'Micro Soft',
            'owner_name' => 'Ahmed',
            'email' => $data['email'],
            'phone' => '1234567890',
            'company_address' => '1234 Elm Street',
            'company_work' => 'Software Development',
            'position_in_company' => 'CEO',
            'company_headquarter' => 'Cairo',
            'status' => 'waitting',
            'show' => true,
            'user_id' => 1,
        ]);

        $becomeCompany = BecomeCompany::latest()->first();
        $this->assertTrue($becomeCompany->hasMedia('logos'));
        $this->assertTrue($becomeCompany->hasMedia('licenses'));
    }

    public function test_update()
    {
        $user = User::factory()->create();
        $become = BecomeCompany::factory()->create();
        $data = [
            'company_name' => 'Micro Soft',
            'owner_name' => 'Ahmed',
            'email' => 'unique_email_' . time() . '@gmail.com',
            'phone' => '1234567890',
            'company_address' => '1234 Elm Street',
            'company_work' => 'Software Development',
            'position_in_company' => 'CEO',
            'company_headquarter' => 'Cairo',
            'company_logo' => UploadedFile::fake()->image('logo.png'),
            'license_and_tex_infomation' => UploadedFile::fake()->image('license.png'),
            'status' => 'waitting',
            'show' => true,
            'user_id' => 1,
        ];

        $response = $this->postJson('/api/become_companies/update/' . $become->id, $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('become_companies', [
            'company_name' => 'Micro Soft',
            'owner_name' => 'Ahmed',
            'email' => $data['email'],
            'phone' => '1234567890',
            'company_address' => '1234 Elm Street',
            'company_work' => 'Software Development',
            'position_in_company' => 'CEO',
            'company_headquarter' => 'Cairo',
            'status' => 'waitting',
            'show' => true,
            'user_id' => 1,
        ]);

        $becomeCompany = BecomeCompany::latest()->first();
        $this->assertTrue($becomeCompany->hasMedia('logos'));
        $this->assertTrue($becomeCompany->hasMedia('licenses'));
    }


    public function test_delete()
    {
        $become = BecomeCompany::factory()->create();
        $response = $this->delete('/api/become_companies/destroy/' . $become->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('become_companies', ['id' => $become->id]);
    }
}
