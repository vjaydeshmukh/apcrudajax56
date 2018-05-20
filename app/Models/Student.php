<?php

namespace App\Models;

use App\Models\Sex;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'students';

	protected $fillable = ['first_name', 'last_name', 'sex_id'];

	protected $primaryKey = 'id';

	public $timestamps = false;
}