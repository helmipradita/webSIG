<?php

namespace App\Http\Controllers;

use App\Models\WebModel;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function __construct()
    {
        $this->WebModel = new WebModel();
    }

    public function index()
    {
        $data = [
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'tempat' => $this->WebModel->AllDataTempat(),
        ];

        return view('web', $data);
    }

    public function kecamatan($id_kecamatan) 
    {
        $kec = $this->WebModel->DetailKecamatan($id_kecamatan);

        $data = [
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'tempat' => $this->WebModel->DataTempat($id_kecamatan),
            'kec' => $kec,
        ];

        return view('kecamatan', $data);
    }

    public function detailtempat($id_tempat)
    {
        $tempat = $this->WebModel->DetailTempat($id_tempat);

        $data = [
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'tempat' => $tempat,
        ];

        return view('detailtempat', $data);
    }
}
