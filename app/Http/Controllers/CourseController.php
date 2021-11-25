<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateCourseRequest;

class CourseController extends Controller
{

    public function index()
    {

        $courses = Course::all();

        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request)
    {

        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $requestt->start_date,
            'end_date' => $request->end_date,
            'status' => 'in_progress',
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('user.course')->with('message', 'Course was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('user.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {

        return view('user.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCourseRequest $request, Course $course)
    {

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $requestt->start_date,
            'end_date' => $request->end_date,
            'status' => 'in_progress',

        ]);

        return redirect()->route('course.edit', $course->id)->with('message', 'Course was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {

        $course->delete();

        return redirect()->route('admin.course.index')->with('message', 'Course successfully deleted');
    }
}
