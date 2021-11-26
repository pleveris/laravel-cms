<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateFolderRequest;

class FolderController extends Controller
{

    public function index()
    {

        $folders = Folder::all();

        return view('folder.index', compact('folders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.folder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFolderRequest $request)
    {

        $folder = Folder::create([
            'user_id' => auth()->user()->id,
            'course_id' => $request->course_id,
            'title' => $request->title
        ]);

        return redirect()->route('user.folders')->with('message', 'Folder was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
        return view('user.folder.show', compact('folder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {

        return view('user.folder.edit', compact('folder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFolderRequest $request, Folder $folder)
    {

        $folder->update([
            'title' => $request->title,

        ]);

        return redirect()->route('folder.edit', $folder->id)->with('message', 'Folder was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {

        $folder->delete();

        return redirect()->route('admin.course.index')->with('message', 'Course successfully deleted');
    }
}
