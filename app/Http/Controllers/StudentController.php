<?php

namespace App\Http\Controllers;

use App\Models\Sex;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
	public function index()
	{
		$sexes = Sex::pluck('gender', 'sex_id');
		
		return view('ajax.index', compact('sexes'));
	}
	
	public function readData()
	{
		$students = Student::join('sexes', 'sexes.sex_id', '=', 'students.sex_id')
												->selectRaw('sexes.gender,
																		students.first_name,
																		students.last_name,
																		CONCAT(students.first_name, " ", students.last_name) AS full_name,
																		students.id')
												->get();

		return view('ajax.studentList', compact('students'));
	}
	
	public function store(Request $request)
	{
		if ($request->ajax())
		{
			$student = Student::create($request->all());
			
			return response($this->find($student->id));
		}
	}
	
	public function find($id)
	{
		return Student::join('sexes', 'sexes.sex_id', '=', 'students.sex_id')
									->selectRaw('sexes.gender,
															students.sex_id,
															students.first_name,
															students.last_name,
															CONCAT(students.first_name, " ", students.last_name) AS full_name,
															students.id')
									->where('students.id', $id)
									->first();
	}
	
	public function edit(Request $request)
	{
		if ($request->ajax())
		{
			$student = Student::findOrFail($request->id);
			
			return response($student);
		}
	}
	
	public function update(Request $request)
	{
		if ($request->ajax())
		{
			$student = Student::findOrFail($request->id);
			$student->update($request->all());
			return response($this->find($student->id));
		}
	}
	
	public function destroy(Request $request)
	{
		if ($request->ajax())
		{
			Student::destroy($request->id);
			
			return response(['message' => 'Student deleted successfully!']);
		}
	}

	public function findPage()
	{
		return Student::join('sexes', 'sexes.sex_id', '=', 'students.sex_id')
									->selectRaw('sexes.gender,
															students.sex_id,
															students.first_name,
															students.last_name,
															CONCAT(students.first_name, " ", students.last_name) AS full_name,
															students.id')
									->paginate(2);
	}

	public function pagination()
	{
		$students = $this->findPage();
		return view('ajax.pagination', compact('students'));
	}

	public function studentPage()
	{
		$students = $this->findPage();
		return view('ajax.studentPage', compact('students'))->render();
	}
}