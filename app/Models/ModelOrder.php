<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelOrder extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['customer_address_id', 'order_status', 'total_price'];
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
