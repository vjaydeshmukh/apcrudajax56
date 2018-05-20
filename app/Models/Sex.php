<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
	protected $table = 'sexes';

	protected $fillable = ['gender'];

	protected $primaryKey = 'id';

	public $timestamps = false;
}