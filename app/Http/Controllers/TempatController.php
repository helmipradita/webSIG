<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatModel;
use App\Models\KecamatanModel;
use Illuminate\Support\Facades\Storage;

class TempatController extends Controller
{
    public function __construct()
    {
        $this->TempatModel = new TempatModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'tempat' => $this->TempatModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];

        return view('dashboard.tempat.index', $data);
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'nama_tempat' => 'required',
            'id_kecamatan' => 'required',
            'alamat' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|max:1024',
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('tempat-image');

            TempatModel::InsertData($validatedData);
        }

        return redirect('/dashboard/tempat')->with('success', 'New product has been added');

        // $validatedData = $request->validate([
        //     'nama_tempat' => 'required',
        //     'id_kecamatan' => 'required',
        //     'alamat' => 'required',
        //     'posisi' => 'required',
        //     'deskripsi' => 'required',
        //     'foto' => 'required|max:1024',
        // ]);

        // $file = Request()->foto;
        // $filename = $file->getClientOriginalName();
        // $file->move(public_path('tempat-image'), $filename);

        // $data = [
        //     'nama_tempat' => request()->nama_tempat,
        //     'id_kecamatan' => request()->id_kecamatan,
        //     'alamat' => request()->alamat,
        //     'posisi' => request()->posisi,
        //     'deskripsi' => request()->deskripsi,
        //     'foto' => request()->foto,
        // ];

        // $this->TempatModel->InsertData($data);

        // return back();
    }

    public function edit($id_tempat)
    {
        $data = [
            'submit' => 'Update',
            'tempat' => $this->TempatModel->DetailData($id_tempat),
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];

        return view('dashboard.tempat.edit', $data);
    }

    public function update(Request $request, $id_tempat)
    {
        $rules = [
            'nama_tempat' => 'required',
            'id_kecamatan' => 'required',
            'alamat' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['foto'] = $request->file('foto')->store('tempat-image');
        }

        $this->TempatModel->UpdateData($id_tempat, $validatedData);

        return redirect('/dashboard/tempat')->with('info', 'Product has been updated!');


        // request()->validate([
        //     'nama_tempat' => 'required',
        //     'id_kecamatan' => 'required',
        //     'alamat' => 'required',
        //     'posisi' => 'required',
        //     'deskripsi' => 'required',
        //     'foto' => 'required|max:1024',
        // ]);

        // if (Request()->foto <> "") {
        //     //hapus foto lama
        //     $tempat = $this->TempatModel->DetailData($id_tempat);
        //     if ($tempat->foto <> "") {
        //         unlink(public_path('tempat-image'). '/' . $tempat->foto);
        //     }

        //     //jika ingin ganti foto
        //     $file = Request()->foto;
        //     $filename = $file->getClientOriginalName();
        //     $file->move(public_path('tempat-image'), $filename);
            
        //     $data = [
        //         'nama_tempat' => request()->nama_tempat,
        //         'id_kecamatan' => request()->id_kecamatan,
        //         'alamat' => request()->alamat,
        //         'posisi' => request()->posisi,
        //         'deskripsi' => request()->deskripsi,
        //         'foto' => request()->foto,
        //     ];

        //     $this->TempatModel->UpdataData($id_tempat, $data);
        // }else {
        //     //jika tidak ganti foto
        //     $data = [
        //         'nama_tempat' => request()->nama_tempat,
        //         'id_kecamatan' => request()->id_kecamatan,
        //         'alamat' => request()->alamat,
        //         'posisi' => request()->posisi,
        //         'deskripsi' => request()->deskripsi,
        //         'foto' => request()->foto,
        //     ];

        //     $this->TempatModel->UpdataData($id_tempat, $data);
        // }

        // return redirect()->route('tempat.index');
    }

    public function delete(TempatModel $tempat, $id_tempat) 
    {
        $tempat = $this->TempatModel->DetailData($id_tempat);

        if ($tempat->foto) {
            Storage::delete($tempat->foto);
        }

        $this->TempatModel->DeleteData($id_tempat);

        return redirect('/dashboard/tempat')->with('delete', 'Product has been deleted!');
    }

    // public function delete($id_kecamatan)
    // {
    //     $this->KecamatanModel->DeleteData($id_kecamatan);

    //     return redirect()->route('kecamatan.index');
    // }
}
