<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function allproducts()
    {
        return $this->hasMany(AllProductsModel::class);
    }

    public function AllData()
    {
        return DB::table('categories')
            ->get();
    }
}
