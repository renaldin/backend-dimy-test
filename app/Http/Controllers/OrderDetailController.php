<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ModelOrderDetail;

class OrderDetailController extends Controller
{

    private $ModelOrderDetail;

    public function __construct()
    {
        $this->ModelOrderDetail = new ModelOrderDetail();
    }

    public function index()
    {
        $orderDetail = $this->ModelOrderDetail->allData();

        return $orderDetail->toJson();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id'      => 'required|integer',
            'product_id'    => 'required|integer',
            'qty'           => 'required|integer',
            'satuan_price'  => 'required|integer',
        ]);

        $addOrderDetail = \App\Models\ModelOrderDetail::create();

        $addOrderDetail->order_id       = $validatedData['order_id'];
        $addOrderDetail->product_id     = $validatedData['product_id'];
        $addOrderDetail->qty            = $validatedData['qty'];
        $addOrderDetail->satuan_price   = $validatedData['satuan_price'];;
        $addOrderDetail->subtotal_price = $validatedData['qty'] * $validatedData['satuan_price'];
        $addOrderDetail->save();

        $order = \App\Models\ModelOrder::find($validatedData['order_id']);

        $order->total_price = $order->total_price + ($validatedData['qty'] * $validatedData['satuan_price']);
        $order->save();

        $msg = [
            'success' => true,
            'message' => 'Order Berhasil Ditambahkan!'
        ];

        return response()->json($msg);
    }

    public function detail($id)
    {

        $orderDetail = $this->ModelOrderDetail->detail([['id', '=', $id]]);

        return $orderDetail->toJson();
    }

    public function delete($id)
    {
        $orderDetail = \App\Models\ModelOrderDetail::find($id);

        if (!empty($orderDetail)) {
            $orderDetail->delete();

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
