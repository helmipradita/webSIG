<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'products' => DB::table('products')->count(),
            'myproducts' => Product::where('user_id', auth()->user()->id)->count(),
            'categories' => DB::table('categories')->count(),
            'kecamatan' => DB::table('kecamatan')->count(),
            'tempat' => DB::table('tempat')->count(),
            'users' => DB::table('users')->count(),
            'roles' => DB::table('roles')->count(),
            'permissions' => DB::table('permissions')->count(),

        ];

        return view('dashboard.index', $data);
    }
}
