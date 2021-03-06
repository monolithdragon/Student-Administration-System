<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudyGroup;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $study_groups = StudyGroup::all();
        $students = Student::where(function ($query) use ($request) {
            if ($request->study) {
                $user = DB::table('student_study_group')
                ->select('student_id')
                ->whereIn('study_group_id', $request->study)
                ->get()
                ->pluck('student_id')
                ->toArray();

                $query->whereIn('id', $user);
            } else if ($request->keyword) {
                $query->where('name', 'like',"%".$request->keyword."%");
            }
        })->paginate(5);
        
        $count_of_students = count(Student::all());

        return view('admin.students', [
            'students' => $students,
            'count_of_students' => $count_of_students,
            'study_groups' => $study_groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.students_create')->with('study_groups', StudyGroup::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::create([
            'name' => $request->name, 
            'email' => $request->email,
            'sex' => $request->sex,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth
        ]);
       
        foreach ((array)$request->study as $group) {
            $student->study_groups()->attach($group);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    { 
        return view('admin.student_edit', [
            'student' => $student
        ])->with('study_groups', StudyGroup::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student, Request $request)
    {
        request()->validate([
            'name' => 'string|max:255',
            'email' => 'email',
            'sex' => 'string',
            'place_of_birth' => 'max:100|string',
            'date_of_birth' => 'date'
        ]);

        $student->update([
            'name' => $request->name, 
            'email' => $request->email,
            'sex' => $request->sex,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth
        ]);

        return redirect()->back()->with('message', 'Sikeres friss??t??s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
