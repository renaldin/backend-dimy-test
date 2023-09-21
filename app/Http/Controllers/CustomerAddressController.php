<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ModelCustomerAddress;

class CustomerAddressController extends Controller
{

    private $ModelCustomerAddress;

    public function __construct()
    {
        $this->ModelCustomerAddress = new ModelCustomerAddress();
    }

    public function index()
    {
        $customerAddress = $this->ModelCustomerAddress->allData();

        return $customerAddress->toJson();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id'   => 'required|integer',
            'address'       => 'required',
        ]);

        $addCustomerAddress = \App\Models\ModelCustomerAddress::create();

        $addCustomerAddress->customer_id    = $validatedData['customer_id'];
        $addCustomerAddress->address        = $validatedData['address'];
        $addCustomerAddress->save();

        $msg = [
            'success' => true,
            'message' => 'Customer Address Berhasil Ditambahkan!'
        ];

        return response()->json($msg);
    }

    public function detail($id)
    {

        $customerAddress = $this->ModelCustomerAddress->detail([['id', '=', $id]]);

        return $customerAddress->toJson();
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'address'     => 'required',
        ]);

        $customerAddress = \App\Models\ModelCustomerAddress::find($id);

        $customerAddress->address   = $validatedData['address'];
        $customerAddress->save();

        $msg = [
            'success' => true,
            'message' => 'Customer Address Berhasil Diedit!'
        ];

        return response()->json($msg);
    }

    public function delete($id)
    {
        $customerAddress = \App\Models\ModelCustomerAddress::find($id);

        if (!empty($customerAddress)) {
            $customerAddress->delete();

            $success = true;
            $message = "Customer Address Berhasil Dihapus!";
        } else {
            $success = false;
            $message = "Customer Address Gagal Dihapus!";
        }

        $msg = [
            'success' => $success,
            'message' => $message
        ];
        return response()->json($msg);
    }
}
