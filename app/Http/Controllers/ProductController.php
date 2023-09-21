<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ModelProduct;

class ProductController extends Controller
{

    private $ModelProduct;

    public function __construct()
    {
        $this->ModelProduct = new ModelProduct();
    }

    public function index()
    {
        $product = $this->ModelProduct->allData();

        return $product->toJson();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name'      => 'required',
            'price'             => 'required|integer',
        ]);

        $addProduct = \App\Models\ModelProduct::create();

        $addProduct->product_name     = $validatedData['product_name'];
        $addProduct->price     = $validatedData['price'];
        $addProduct->save();

        $msg = [
            'success' => true,
            'message' => 'Product Berhasil Ditambahkan!'
        ];

        return response()->json($msg);
    }

    public function detail($id)
    {

        $product = $this->ModelProduct->detail([['id', '=', $id]]);

        return $product->toJson();
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'price'        => 'required|integer',
        ]);

        $product = \App\Models\ModelProduct::find($id);

        $product->product_name = $validatedData['product_name'];
        $product->price = $validatedData['price'];
        $product->save();

        $msg = [
            'success' => true,
            'message' => 'Product Berhasil Diedit!'
        ];

        return response()->json($msg);
    }

    public function delete($id)
    {
        $product = \App\Models\ModelProduct::find($id);

        if (!empty($product)) {
            $product->delete();

            $success = true;
            $message = "Product Berhasil Dihapus!";
        } else {
            $success = false;
            $message = "Product Gagal Dihapus!";
        }

        $msg = [
            'success' => $success,
            'message' => $message
        ];
        return response()->json($msg);
    }
}
