<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebModel extends Model
{
    

    public function DataKecamatan()
    {
        return DB::table('kecamatan')
            ->get();
    }

    public function DetailKecamatan($id_kecamatan)
    {
        return DB::table('kecamatan')
            ->where('id_kecamatan', $id_kecamatan)->first();
    }

    public function DataTempat($id_kecamatan)
    {
        return DB::table('tempat')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'tempat.id_kecamatan')
            ->where('tempat.id_kecamatan', $id_kecamatan)
            ->get();
    }

    public function AllDataTempat()
    {
        return DB::table('tempat')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'tempat.id_kecamatan')
            ->get();
    }

    public function DetailTempat($id_tempat)
    {
        return DB::table('tempat')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'tempat.id_kecamatan')
            ->where('tempat.id_tempat', $id_tempat)
            ->first();
    }
}
