<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class productsApiController extends Controller
{
	public function index()
	{
		return Response::json(Products::all(), 200, array(), JSON_PRETTY_PRINT);
	}
	
	public function readProduct($something)
	{

		if(\Request::is('api/products/id/*'))
		{
			$product = Products::where('id', $something)->get();
			
			return Response::json($product, 200, array(), JSON_PRETTY_PRINT);
		}
		
		if(\Request::is('api/products/name/*'))
		{
			$product = Products::where('name', $something)->get();
			
			return Response::json($product, 200, array(), JSON_PRETTY_PRINT);
		}
		
		if(\Request::is('api/products/brand/*'))
		{
			$product = Products::where('brand', $something)->get();
			
			return Response::json($product, 200, array(), JSON_PRETTY_PRINT);
		}
		
		if(\Request::is('api/products/color/*'))
		{
			$product = Products::where('color', $something)->get();
			
			return Response::json($product, 200, array(), JSON_PRETTY_PRINT);
		}
		
	}
	
	public function deleteProduct($id)
	{
		
	}
}