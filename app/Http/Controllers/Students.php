<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Response;

class Students extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
    	$students = Student::latest()->paginate(10);
    	return view('edit.student', ['students' => $students]);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
			'name' => 'required',
			'phone_number' => 'required',
			'email' => 'required',
    	]);
 
		$studentId = $request->student_id;
		$student	= Student::updateOrCreate(
			['id' => $studentId],
			[
				'name' => $request->name,
				'phone_number' => $request->phone_number,
				'email' => $request->email,
			]
		);
 
        return Response::json($student);
	}

    public function edit($id)
	{
        $where = array('id' => $id);
        $student  = Student::where($where)->first();

        return Response::json($student);
	}

	public function hapus($id)
	{
        $student = Student::where('id', $id)->delete();
        return Response::json($student);
	}
}