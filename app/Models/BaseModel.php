<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
  protected $guarded = [];

  public static $rules = [];

  public function updateRules()
  {
    $rules = static::$rules;

    foreach ($rules as $field => $rule)
    {
      $rules[$field] = str_replace(':id', $this->getKey(), $rule);
    }
    return $rules;
  }
}