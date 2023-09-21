<?php

namespace Tests\Feature\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerAddressPostTest extends TestCase
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
            "address" => "test"
        ];

        $response = $this->post('/api/customer-address/store', $data);

        $response->assertStatus(200);
    }
}
