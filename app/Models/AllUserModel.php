<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AllUserModel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function AllData()
    {
        return DB::table('users')
            ->get();
    }

    public function InsertData($data)
    {
        return DB::table('users')
            ->insert($data);
    }

    public function DetailData($id)
    {
        return DB::table('users')
            ->where('id', $id)->first();
    }

    public function UpdateData($id, $data)
    {
        return DB::table('users')
            ->where('id', $id)
            ->update($data);
    }

    public function DeleteData($id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->delete();
    }
}
