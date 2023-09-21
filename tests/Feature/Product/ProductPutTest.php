<?php

namespace Tests\Feature\Customer;

use App\Models\ModelCustomer;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductPutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            "product_name" => "Product 3 Update",
            "price" => 1000
        ];

        $response = $this->put("/api/product/5", $data);

        $response->assertStatus(200);
    }
}
