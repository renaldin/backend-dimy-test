<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelProduct extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['product_name', 'price'];
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
