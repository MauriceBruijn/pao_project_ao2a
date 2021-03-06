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
	
	public function readProduct($something, $attribute)
	{
		$request_items = ['id', 'name', 'brand', 'color'];
		
		foreach($request_items as $request_item)
		{
			if(\Request::is('api/products/'. $request_item .'/*'))
			{
				$product = Products::where($request_item, $attribute)->get();
				
				return Response::json($product, 200, array(), JSON_PRETTY_PRINT);
			}
		}
	}
	
	public function addProduct($id)
	{
		
	}
	
	public function deleteProduct($id)
	{
		
	}
}