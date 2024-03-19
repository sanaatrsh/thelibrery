<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Rule\Parameters;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::simplePaginate(10);
        return view('admin.student.students', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
        ]);
        if ($request['university_id']) {
        }

        $data = $request->except('_token');
        // dd($data);
        $student = Student::create($data);
        return redirect()->back()
            ->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return view('admin.student.Bookstudent', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
