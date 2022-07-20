<?php

namespace App\Http\Controllers;

use App\Models\AllProductsModel;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\WebModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AllProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->AllProductsModel = new AllProductsModel();
    }
    
    public function index()
    {
        
        return view('dashboard.allproducts.index', [
            'allproducts' => Product::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.allproducts.index', [
            'allproducts' => Product::all(),
        ]);
    }

    public function store()
    {
        return view('dashboard.allproducts.index', [
            'allproducts' => Product::all(),
        ]);
    }

    public function show()
    {
        return view('dashboard.allproducts.index', [
            'allproducts' => Product::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('dashboard.allproducts.index', [
            'allproducts' => Product::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        return view('dashboard.allproducts.index', [
            'allproducts' => Product::all(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }

        Product::destroy($product->id);

        return redirect('/dashboard/allproducts')->with('success', 'Product has been deleted!');
    }
}
