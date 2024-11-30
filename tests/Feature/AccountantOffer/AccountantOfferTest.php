<?php

namespace Tests\Feature\AccountantOffer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\AccountantOffer\Models\AccountantOffer;
use Tests\TestCase;

class AccountantOfferTest extends TestCase
{

    use DatabaseTransactions;

    public function test_example(): void
    {
        $accountantOffer = AccountantOffer::factory()->create();
        $response = $this->get('api/accountant_offers/showall');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $accountantOffer = AccountantOffer::factory()->create();
        $response = $this->getJson('/api/accountant_offers/show/' . $accountantOffer->id);
        $response->assertStatus(200);
    }



    public function test_store()
    {
        $accountantOffer = AccountantOffer::factory()->create();
        $data = [
            'position' => 'Back',
            'date' => '2024-10-01',
            'sallery' => 5698,
            'status' => 'approved',
            'type' => 'fullTime',
            'show' => 1,
            'accountant_id' => $accountantOffer->id,
        ];
        $response = $this->postJson('api/accountant_offers/store', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('accountant_offers', [
            'position' => 'Back',
            'date' => '2024-10-1',
            'sallery' => 5698,
            'status' => 'approved',
            'type' => 'fullTime',
            'show' => 1,
            'accountant_id' => $accountantOffer->id,
        ]);
    }


    public function test_update()
    {
        $accountantOffer = AccountantOffer::factory()->create();
        $data = [
            'position' => 'Back',
            'date' => '2024-10-1',
            'sallery' => 5698,
            'status' => 'approved',
            'type' => 'fullTime',
            'show' => 1,
            'accountant_id' => $accountantOffer->id,
        ];
        $response = $this->postJson('/api/accountant_offers/update/' . $accountantOffer->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('accountant_offers', [
            'position' => 'Back',
            'date' => '2024-10-1',
            'sallery' => 5698,
            'status' => 'approved',
            'type' => 'fullTime',
            'show' => 1,
            'accountant_id' => $accountantOffer->id,
        ]);
    }


    public function test_delete()
    {
        $accountantOffer = AccountantOffer::factory()->create();
        $response = $this->delete('/api/accountant_offers/destroy/' . $accountantOffer->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('accountant_offers', ['id' => $accountantOffer->id]);
    }
}
