<?php

namespace App\Http\Controllers;

use App\Models\AllUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AllUserController extends Controller
{
    public function __construct()
    {
        $this->AllUser = new AllUserModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'alluser' => $this->AllUser->AllData(),
        ];

        return view('dashboard.alluser.index', $data);
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

        $this->AllUser->InsertData($data);

        return back();
    }

    public function edit($id)
    {
        $data = [
            'submit' => 'Edit',
            'alluser' => $this->AllUser->DetailData($id),
        ];

        return view('dashboard.alluser.edit', $data);
    }

    public function update($id)
    {
        request()->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'name' => request()->name,
            'username' => request()->username,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            
        ];

        $this->AllUser->UpdateData($id, $data);

        return redirect()->route('alluser.index');
    }

    public function delete($id)
    {
        $this->AllUser->DeleteData($id);

        return redirect()->route('alluser.index');
    }
}
