<?php

namespace Tests\Feature\Customer;

use App\Models\ModelCustomer;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentMethodPutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            "method_name" => "Method 4 update",
            "is_active" => 1
        ];

        $response = $this->put("/api/payment-method/1", $data);

        $response->assertStatus(200);
    }
}
