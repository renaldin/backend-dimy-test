<?php

namespace Tests\Feature\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentMethodPostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            "method_name" => "Method 4",
            "is_active" => 1
        ];

        $response = $this->post('/api/payment-method/store', $data);

        $response->assertStatus(200);
    }
}
