<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
	public function index()
	{
		$products = Products::all();
		return view('products.index', compact('products'));
	}
	
	/**
     * 
     * Show method in ProductsController
     * 
     */
	public function product($products)
	{
		$product = Products::where('id', $products)->get();
		
		return view('products.product', compact('product'));
	}
}