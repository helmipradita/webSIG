<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\WebModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->WebModel = new WebModel();
    }

    public function index()
    {
        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('products', [
            "title" => "Semua Produk",
            "active" => "products",
            // "products" => Product::all(),
            "products" => Product::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'categories' => Category::all()
        ]);
    }

    public function show(Product $product)
    {
        return view('product', [
            "title" => "Single Product",
            "active" => "products",
            "product" => $product,
        ]);
    }
}
