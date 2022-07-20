<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TempatModel extends Model
{
    use HasFactory;

    protected $guarded = ['id_tempat'];

    public function AllData()
    {
        return DB::table('tempat')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'tempat.id_kecamatan')
            ->get();
    }

    public function InsertData($data)
    {
        return DB::table('tempat')
            ->insert($data);
    }

    public function DetailData($id_tempat)
    {
        return DB::table('tempat')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'tempat.id_kecamatan')
            ->where('id_tempat', $id_tempat)->first();
    }

    public function UpdateData($id_tempat, $data)
    {
        return DB::table('tempat')
            ->where('id_tempat', $id_tempat)
            ->update($data);
    }

    public function DeleteData($id_tempat)
    {
        return DB::table('tempat')
            ->where('id_tempat', $id_tempat)
            ->delete();
    }
}
