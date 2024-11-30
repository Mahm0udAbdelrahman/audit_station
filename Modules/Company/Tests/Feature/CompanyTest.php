<?php

namespace Tests\Feature\Company;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Modules\Accountant\Models\Accountant;
use Modules\Company\Models\Company;
use Modules\JobOffer\Models\JobOffer;
use Tests\TestCase;

class CompanyTest extends TestCase
{

    use DatabaseTransactions;


    public function test_showall(){
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');

        $company = Company::factory()->create();
        $response = $this->getJson('api/companies/showall');
        $response->assertStatus(200);
    }

    public function test_show(){
        $user = User::factory()->create();
        $this->actingAs($user , 'sanctum');
        $company = Company::factory()->create();
        $response = $this->getJson('/api/companies/show/'.$company->id);
        $response->assertStatus(200);
    }

    public function test_store(){
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
        $file = UploadedFile::fake()->create('certificate.pdf', 100, 'application/pdf');
        $accountant = Accountant::factory()->create();

        $email = 'unique_email_' . time() . '@gmail.com';

        $data = [
           'name'=>'Ahmed',
           'company_name'=>'microsoft',
           'email' => $email,
           'status'=>'activated',
           'show'=>1,
           'phone'=>'01123456987',
           'position'=>'BackEnd',
           'specialization'=>'BackEnd',
           'country'=>'giza',
           'companyAddress'=>'cairo',
           'certificate'=> $file,
           'accountant_id'=>$accountant->id
        ];
        $response = $this->postJson('api/companies/store',$data);
        // $response->dump();
        $response->assertStatus(201);
        $this->assertDatabaseHas('companies',[
            'name'=>'Ahmed',
            'company_name'=>'microsoft',
            'email' => $email,
            'status'=>'activated',
            'show'=>1,
            'phone'=>'01123456987',
            'position'=>'BackEnd',
            'specialization'=>'BackEnd',
            'country'=>'giza',
            'companyAddress'=>'cairo',
            'certificate'=> $file,
            'accountant_id'=>$accountant->id
        ]);
    }

}
