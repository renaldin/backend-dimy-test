<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ModelPaymentMethod;

class PaymentMethodController extends Controller
{

    private $ModelPaymentMethod;

    public function __construct()
    {
        $this->ModelPaymentMethod = new ModelPaymentMethod();
    }

    public function index()
    {
        $paymentMethod = $this->ModelPaymentMethod->allData();

        return $paymentMethod->toJson();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'method_name'   => 'required',
            'is_active'     => 'required|integer',
        ]);

        $addPaymentMethod = \App\Models\ModelPaymentMethod::create();

        $addPaymentMethod->method_name  = $validatedData['method_name'];
        $addPaymentMethod->is_active    = $validatedData['is_active'];
        $addPaymentMethod->save();

        $msg = [
            'success' => true,
            'message' => 'Payment Method Berhasil Ditambahkan!'
        ];

        return response()->json($msg);
    }

    public function detail($id)
    {

        $paymentMethod = $this->ModelPaymentMethod->detail([['id', '=', $id]]);

        return $paymentMethod->toJson();
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'method_name'   => 'required',
            'is_active'     => 'required|integer',
        ]);

        $paymentMethod = \App\Models\ModelPaymentMethod::find($id);

        $paymentMethod->method_name = $validatedData['method_name'];
        $paymentMethod->is_active   = $validatedData['is_active'];
        $paymentMethod->save();

        $msg = [
            'success' => true,
            'message' => 'Payment Method Berhasil Diedit!'
        ];

        return response()->json($msg);
    }

    public function delete($id)
    {
        $paymentMethod = \App\Models\ModelPaymentMethod::find($id);

        if (!empty($paymentMethod)) {
            $paymentMethod->delete();

            $success = true;
            $message = "Payment Method Berhasil Dihapus!";
        } else {
            $success = false;
            $message = "Payment Method Gagal Dihapus!";
        }

        $msg = [
            'success' => $success,
            'message' => $message
        ];
        return response()->json($msg);
    }
}
