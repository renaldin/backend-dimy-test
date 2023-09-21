<?php

namespace Tests\Feature\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductPostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            "product_name" => "Product 3",
            "price" => 1000
        ];

        $response = $this->post('/api/product/store', $data);

        $response->assertStatus(200);
    }
}
