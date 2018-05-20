<?php

namespace App\Http\Controllers;

use App\Models\Sex;
use App\Models\Student;
use Illuminate\Http\Request;
use Validator;

class ValidationController extends Controller
{
	public function insertStudentValidation(Request $request)
	{
		$sexes = Sex::all();
		return view('ajax.insertStudentValidation', compact('sexes'));
	}

	public function storeData(Request $request)
	{
		$validator = Validator::make($request->all(), [
				'first_name'  => 'required',
				'last_name'   => 'required',
				'sex_id'      => 'required'
		]);

		if ($validator->passes())
		{
			/*			Student::create([
								'first_name' => $request->first_name,
								'last_name' => $request->last_name,
								'sex_id' => $request->sex_id,
						]);*/
			Student::create($request->all());

			return response()->json(['success' => 'Inserted successfully']);
		}

		return response()->json(['error' => $validator->errors()->all()]);
	}
}