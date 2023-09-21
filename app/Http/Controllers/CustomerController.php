<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ModelCustomer;

class CustomerController extends Controller
{

    private $ModelCustomer;

    public function __construct()
    {
        $this->ModelCustomer = new ModelCustomer();
    }

    public function index()
    {
        $customer = $this->ModelCustomer->allData();

        return $customer->toJson();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name'     => 'required',
        ]);

        $addCustomer = \App\Models\ModelCustomer::create();

        $addCustomer->customer_name     = $validatedData['customer_name'];
        $addCustomer->save();

        $msg = [
            'success' => true,
            'message' => 'Customer Berhasil Ditambahkan!'
        ];

        return response()->json($msg);
    }

    public function detail($id)
    {

        $customer = $this->ModelCustomer->detail([['id', '=', $id]]);

        return $customer->toJson();
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required',
        ]);

        $customer = \App\Models\ModelCustomer::find($id);

        $customer->customer_name = $validatedData['customer_name'];
        $customer->save();

        $msg = [
            'success' => true,
            'message' => 'Customer Berhasil Diedit!'
        ];

        return response()->json($msg);
    }

    public function delete($id)
    {
        $customer = \App\Models\ModelCustomer::find($id);

        if (!empty($customer)) {
            $customer->delete();

            $success = true;
            $message = "Customer Berhasil Dihapus!";
        } else {
            $success = false;
            $message = "Customer Gagal Dihapus!";
        }

        $msg = [
            'success' => $success,
            'message' => $message
        ];
        return response()->json($msg);
    }
}
