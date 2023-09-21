<?php

namespace Tests\Feature\Customer;

use App\Models\ModelCustomer;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerAddressPutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            "customer_id" => 3,
            "address" => "test update"
        ];

        $response = $this->put("/api/customer-address/1", $data);

        $response->assertStatus(200);
    }
}
