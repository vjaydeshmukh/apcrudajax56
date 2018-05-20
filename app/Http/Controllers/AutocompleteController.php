<?php

namespace App\Http\Controllers;

use App\Models\Sex;
use App\Models\Student;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
	public function index()
	{
		$sexes = Sex::all();
		return view('autocomplete.index', compact('sexes'));
	}

	public function search(Request $request)
	{
		$search = $request->term;
		$students = Student::where('first_name', 'LIKE', '%'.$search.'%')
												->orWhere('last_name', 'LIKE', '%'.$search.'%')
												->selectRaw('id, CONCAT(first_name, " ", last_name) AS full_name,
															first_name, last_name, sex_id')
												->get();
		$data = [];

		foreach ($students as $key => $value)
		{
			$data [] = [
					'id' => $value->id,
					'value' => $value->full_name,
					'first_name' => $value->first_name,
					'last_name'  => $value->last_name,
					'sex_id'     => $value->sex_id
			];
		}

		return response($data);
	}
}