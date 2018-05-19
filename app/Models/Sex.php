<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
  public function students()
  {
    return $this->hasMany(Student::class, 'id', 'sex_id');
  }
}