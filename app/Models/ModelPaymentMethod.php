<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelPaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_methods';
    protected $fillable = ['method_name', 'is_active'];
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
