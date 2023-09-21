<?php

namespace Tests\Feature\Customer;

use App\Models\ModelCustomer;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerPutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            'customer_name' => 'test update',
        ];

        $response = $this->put("/api/customer/1", $data);

        $response->assertStatus(200);
    }
}
