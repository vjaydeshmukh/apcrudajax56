<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
	
	use App\Models\Product;
	use Illuminate\Support\Facades\Input;
	use Illuminate\Http\Request;
	
	Route::get('/', function () {
    return view('layouts.master');
});

Route::prefix('/students')->group(function ()
{
	Route::get('/', 'StudentController@index')->name('index');
	Route::get('/read-data', 'StudentController@readData')->name('readData');
	Route::post('/store', 'StudentController@store')->name('store');
	Route::get('/edit', 'StudentController@edit')->name('edit');
	Route::post('/update', 'StudentController@update')->name('update');
	Route::post('/destroy', 'StudentController@destroy')->name('destroy');
	Route::get('/pagination', 'StudentController@pagination');
	Route::get('/page/ajax', 'StudentController@studentPage');
	Route::get('/datatable', 'DatatableController@index');
});

Route::resource('product', 'ProductAjaxController');


Route::get('ajaxCRUD', function () {
	$products = Product::orderBy('brand_name')->get();
	return view('ajaxProduct.index-ajax')->with('products',$products);
});
Route::get('ajaxCRUD/{product_id?}', function($product_id){
	$product = Product::find($product_id);
	return response()->json($product);
});
Route::post('ajaxCRUD',function(Request $request){
	$product = Product::create($request->all());
	return response()->json($product);
});
Route::put('ajaxCRUD/{product_id?}', function(Request $request, $product_id) {
	$product = Product::find($product_id);
	$product->brand_name = $request->brand_name;
	$product->model_name = $request->model_name;
	$product->price = $request->price;
	$product->description = $request->description;
	$product->save();
	return response()->json($product);
});
Route::delete('ajaxCRUD/{product_id?}', function($product_id) {
	$product = Product::destroy($product_id);
	return response()->json($product);
});