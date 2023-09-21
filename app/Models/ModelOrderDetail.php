<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelOrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $fillable = ['order_id', 'product_id', 'qty', 'satuan_price', 'subtotal_price', 'note'];
    protected $primaryKey = 'id';

    public function allData()
    {
        return DB::table($this->table)->get();
    }

    public function detail($where)
    {
        return DB::table($this->table)
            ->where($where)
            ->get();
    }
}
