<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LibraryModel;

//LibraryModel
class LibraryConttoller extends Controller
{
    //
    public function index()
    {
        return view("admin.library");
    }

     // Fetch all books
     public function show()
     {
         return LibraryModel::all();
     }
 
     // Upload a book
     public function store(Request $request)
     {

    //   echo "<PRE>";  print_r($request->all());exit();
        //  $request->validate([
        //      'title' => 'required|string|max:255',
        //      'author' => 'required|string|max:255',
        //      'file' => 'required|file|mimes:pdf',
        //  ]);
 
         $filePath = $request->file('file')->store('books');
 
         $book = LibraryModel::create([
             'title' => $request->title,
             'author' => $request->author,
             'file_path' => $filePath,
         ]);
 
         return response()->json($book, 201);
     }
 
     // Download a book
     public function download(LibraryModel $book)
     {
         return Storage::download($book->file_path, $book->title . '.pdf');
     }
 
     // Toggle visibility
     public function toggleVisibility(LibraryModel $book)
     {
         $book->update(['is_hidden' => !$book->is_hidden]);
         return response()->json($book);
     }
}
