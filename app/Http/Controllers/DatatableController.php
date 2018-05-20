<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
	public function index()
	{
		$students = Student::join('sexes', 'sexes.id', '=', 'students.sex_id')
											->selectRaw('sexes.gender,
																	students.first_name,
																	students.last_name,
																	CONCAT(students.first_name, " ", students.last_name) AS full_name,
																	students.id')
											->orderBy('first_name')
											->get();

		return view('datatable.index', compact('students'));
	}
}