<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'books' => Book::latest()->get()
        ]);
    }

    public function show($id)
    {
        return view('books.show', [
            'book' => Book::find($id),
            'reviews' => Book::find($id)->reviews
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'alpha|required',
            'publication_date' => 'date|required',
            'isbn' => ['required', 'unique:books']
        ]);

        //Save Book with respecting ID on creation
        $book = Book::create($formFields);
        $bookId = $book->id;

        //Check if any Checkboxes are checked
        if ($request->formats != null) {
            $selectedFormats = $request->formats;
            //Iterate through selected Checkboxes 
            foreach ($selectedFormats as $format) {
                //Create new Request with ID and format
                $newRequest = new Request();
                $newRequest->merge(['format' => $format,'book_id' =>$bookId]);
                //Call BookFormatController's store function to cerate new DB Entry
                app()->call('App\Http\Controllers\BookFormatController@store', ['request' => $newRequest]);
            }
        }

        return redirect('/')->with('message', 'Book added succesfully');
    }

    public function edit($id)
    {
        return view('books.edit', [
            'book' => Book::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        //Fetch the Book to update
        $book = Book::find($id);

        //Validate the form fields
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_date' => 'required',
            'isbn' => ['required', 'unique:books']
        ]);

        //Update Book
        $book->update($formFields);

        return redirect('books/' . $book->id)->with('message', 'Book updated succesfully');
    }
}
