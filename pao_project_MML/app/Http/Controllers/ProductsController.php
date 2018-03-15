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

    public function newProduct()
    {
        return view ('products.add');
    }

    public function add(Request $request)
    {
       $newProduct = new Products();

        $newProduct->name = $request->name;
        $newProduct->brand = $request->brand;
        $newProduct->color = $request->color;
        $newProduct->price = $request->price;
        $newProduct->img = $request->img;
        $newProduct->description = $request->description;

        $newProduct->save();
		
		return redirect()->to('/');
    }
	
	public function deleteProduct(Request $request, $product)
    {
		$product = Products::find($product);
		$product->delete($request->all());
		
		return redirect()->to('/');
    }
}