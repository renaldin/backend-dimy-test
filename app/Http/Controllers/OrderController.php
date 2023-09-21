<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ModelOrder;

class OrderController extends Controller
{

    private $ModelOrder;

    public function __construct()
    {
        $this->ModelOrder = new ModelOrder();
    }

    public function index()
    {
        $order = $this->ModelOrder->allData();

        return $order->toJson();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_address_id'   => 'required|integer',
        ]);

        $addOrder = \App\Models\ModelOrder::create();

        $addOrder->customer_address_id  = $validatedData['customer_address_id'];
        $addOrder->order_status         = 'Menunggu Bayar';
        $addOrder->total_price          = 0;
        $addOrder->save();

        $msg = [
            'success' => true,
            'message' => 'Order Berhasil Ditambahkan!'
        ];

        return response()->json($msg);
    }

    public function detail($id)
    {

        $order = $this->ModelOrder->detail([['id', '=', $id]]);

        return $order->toJson();
    }

    public function delete($id)
    {
        $order = \App\Models\ModelOrder::find($id);

        if (!empty($order)) {
            $order->delete();

            $success = true;
            $message = "Order Berhasil Dihapus!";
        } else {
            $success = false;
            $message = "Order Gagal Dihapus!";
        }

        $msg = [
            'success' => $success,
            'message' => $message
        ];
        return response()->json($msg);
    }
}
