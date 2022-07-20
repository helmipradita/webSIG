<?php

namespace App\Http\Controllers;

use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'kategori' => $this->KategoriModel->AllData(),
        ];

        return view('dashboard.kategori.index', $data);
    }

    public function store() 
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = [
            'name' => request()->name,
            'slug' => request()->slug,
        ];

        $this->KategoriModel->InsertData($data);

        return back();
    }

    public function edit($id)
    {
        $data = [
            'submit' => 'Edit',
            'kategori' => $this->KategoriModel->DetailData($id),
        ];

        return view('dashboard.kategori.edit', $data);
    }

    public function update($id)
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = [
            'name' => request()->name,
            'slug' => request()->slug,
        ];

        $this->KategoriModel->UpdateData($id, $data);

        return redirect()->route('kategori.index');
    }

    public function delete($id)
    {
        $this->KategoriModel->DeleteData($id);

        return redirect()->route('kategori.index');
    }
}
