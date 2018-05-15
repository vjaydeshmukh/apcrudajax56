<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
	public function index()
	{
		return view('ajax.index');
	}
	
	public function readData()
	{
		$students = Student::join('sexes', 'sexes.sex_id', '=', 'students.sex_id')
												->selectRaw('sexes.sex_id,
																		students.first_name,
																		students.last_name,
																		CONCAT(students.first_name, " ", students.last_name) AS full_name,
																		students.email,
																		students.dob,
																		students.id')
												->get();
		
		//return response($students);
		return view('ajax.studentList', compact('students'));
	}
}