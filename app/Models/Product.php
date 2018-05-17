<?php

namespace App\Models;

use App\Models\BaseModel;

class Product extends BaseModel
{
	protected $table = 'products';
	
	protected $fillable = ['brand_name','model_name','price','description'];

  public function getRouteKeyName()
  {
    return 'brand_name';
  }

  public $messages;

  public static $rules = [
      'brand_name' => 'required|min:4|max:60|unique:products,brand_name,:id',
      'model_name' => 'required',
	    'price'      => 'required|numeric'
  ];
}