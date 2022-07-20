<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriModel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function AllData()
    {
        return DB::table('categories')
            ->get();
    }

    public function InsertData($data)
    {
        return DB::table('categories')
            ->insert($data);
    }

    public function DetailData($id)
    {
        return DB::table('categories')
            ->where('id', $id)->first();
    }

    public function UpdateData($id, $data)
    {
        return DB::table('categories')
            ->where('id', $id)
            ->update($data);
    }

    public function DeleteData($id)
    {
        return DB::table('categories')
            ->where('id', $id)
            ->delete();
    }
}
