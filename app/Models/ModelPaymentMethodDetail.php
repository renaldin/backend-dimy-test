<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelPaymentMethodDetail extends Model
{
    use HasFactory;

    protected $table = 'payment_method_details';
    protected $fillable = ['order_id', 'payment_method_id'];
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
