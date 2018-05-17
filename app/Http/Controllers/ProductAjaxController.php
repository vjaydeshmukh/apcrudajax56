<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Validator;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAjaxController extends Controller
{
  public function index()
  {
  	$products = Product::orderBy('brand_name')->get();
  	return view('ajaxProduct.index', compact('products'));
  }
  
  public function create()
  {
  	$product = new Product();
    return view('ajaxProduct.createUpdate', compact('product'));
  }
  
  public function store(Request $request)
  {
	  if ($request->ajax())
	  {
		  $validation = Validator::make($request->all(), Product::$rules);

		  if ($validation->fails())
		  {
			  return response()->json([
				  'fail'     => true,
				  'messages' => $validation->messages()
			  ]);
		  } else {
			  Product::create($request->all());
			  Flash::success('Registry created successfully.');

			  return response()->json([
			  	'success'  => true,
				  'messages' => 'Created!!!',
				  'url'      => '/product',
			  ]);
		  }
	  }
  }
  
  public function show(Product $product)
  {
  }
  
  public function edit(Product $product)
  {
	  $product = Product::findOrFail($product);
	  return view('ajaxProduct.createUpdate', compact('product'));
  }
  
  public function update(Request $request, Product $product)
  {
	  if ($request->ajax())
	  {
		  $validation = Validator::make($request->all(), Product::$rules);
		
		  if ($validation->fails())
		  {
			  return response()->json([
				  'fail'     => true,
				  'messages' => $validation->messages()
			  ]);
		  } else {
			  Product::updateOrCreate($request->all());
			  Flash::success('Registry updated successfully.');
			
			  return response()->json([
				  'success'  => true,
				  'messages' => 'Updated!!!',
				  'url'      => '/product',
			  ]);
		  }
	  }
  }
  
  public function destroy(Product $product)
  {
  }
}