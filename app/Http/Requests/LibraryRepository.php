<?php

namespace App\Http\Requests;

use App\Http\Traits\AttachmentLibraryTrait;
use App\Models\Grade;
use App\Models\Library;

class LibraryRepository implements \App\Http\Interfaces\LibraryRepositoryInterface
{
    use AttachmentLibraryTrait;

    public function index()
    {

        $books = Library::all();
        return view('pages.library.index', compact('books'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('pages.library.create', compact('grades'));
    }

    public function store($request)
    {
        try {
            $books = new Library();
            $books->title = $request->title;
            $books->file_name = $request->file('file_name')->getClientOriginalName();
            $books->grade_id = $request->grade_id;
            $books->classroom_id = $request->classroom_id;
            $books->section_id = $request->section_id;
            $books->teacher_id = 1;

            $books->save();
            $this->fileupload($request, 'file_name');


            toastr()->success(trans('messagesT.Success'));
            return redirect()->route('admin.library');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $book = Library::findOrFail($id);
        $grades = Grade::all();
        return view('pages.library.edit', compact('book', 'grades'));
    }

    public function update($request)
    {

        try {

            $book = Library::findOrFail($request->id);

            if ($request->hasfile('file_name')) {

                $this->deleteFile($book->file_name);

                $this->fileupload($request, 'file_name');

                $file_name_new = $request->file('file_name')->getClientOriginalName();

                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;

            }
            $book->title = $request->title;
            $book->grade_id = $request->grade_id;
            $book->classroom_id = $request->classroom_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();
            toastr()->success(trans('messagesT.Update'));
            return redirect()->route('admin.library');


        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $this->deleteFile($request->file_name);

        $book = Library::findOrFail($request->id);
        $book->delete();

        toastr()->error(trans('messagesT.Delete'));
        return redirect()->route('admin.library');
    }

    public function download($filename)
    {
        return response()->download(public_path('attachments/library/' . $filename));
    }
}
