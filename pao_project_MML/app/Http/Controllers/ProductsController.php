<?php

namespace App\Http\Controllers;

use Auth;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
		$products = Products::all();
		return view('products.index', compact('products'));
	}

    public function edit($id)
    {
		if(Auth::user()->rank == 0)
		{
			return redirect()->to('/');
		}
		
        $products = Products::where('id', $id)->get();
        return view('products.edit', compact('products'));
    }
	
	public function product($products)
	{
		$product = Products::where('id', $products)->get();
		
		return view('products.product', compact('product'));
	}

    public function newProduct()
    {
		if(Auth::user()->rank == 0)
		{
			return redirect()->to('/');
		}
		
        return view ('products.add');
    }

    public function add(Request $request)
    {
		if(Auth::user()->rank == 0)
		{
			return redirect()->to('/');
		}
		
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
		if(Auth::user()->rank == 0)
		{
			return redirect()->to('/');
		}
		
		$product = Products::find($product);
		$product->delete($request->all());
		
		return redirect()->to('/');
    }

    public function editProduct(Request $request, $product)
    {
		if(Auth::user()->rank == 0)
		{
			return redirect()->to('/');
		}
		
        $product = Products::find($product);
        $product->update($request->all());

        return redirect()->to('/');
    }
}