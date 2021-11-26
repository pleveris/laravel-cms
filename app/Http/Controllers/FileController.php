<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateFileRequest;

class FileController extends Controller
{

    public function index()
    {

        $files = File::all();

        return view('file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFileRequest $request)
    {

        $file = File::create([
            'user_id' => auth()->user()->id,
            'folder_id' => $request->folder_id,
            'title' => $request->title
        ]);

        return redirect()->route('user.files')->with('message', 'File was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('user.file.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {

        return view('user.file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFileRequest $request, File $file)
    {

        $file->update([
            'title' => $request->title,

        ]);

        return redirect()->route('file.edit', $file->id)->with('message', 'File was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {

        $file->delete();

        return redirect()->route('admin.course.index')->with('message', 'Course successfully deleted');
    }
}
