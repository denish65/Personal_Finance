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
 
    //    echo "<PRE>"; print_r($request->all());exit();


    //    [title] => scs
    //    [author] => sd
    //    [category] => sd
    //    [date] => 2024-11-28
    //    [payment_type] => 1


        //  $filePath = $request->file('file')->store('books');

        $filePath = null;
         if ($request->hasFile('books')) {
            $image = $request->file('books');
            // $imagePath = $image->store('expenses', 'public'); // Store file in 'public/expenses' directory
            $customFolder = 'images/Library'; 
            $filePath = $image->storeAs($customFolder, 'books_' . time() . '.' . $image->getClientOriginalExtension(), 'public');
    
        }
 
         $book = LibraryModel::create([
             'title' => $request->title,
             'author' => $request->author,
             'category' => $request->category,
             'date' => $request->date,
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
