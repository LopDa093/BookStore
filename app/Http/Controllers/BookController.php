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
        // Retrieve values of checkboxes from the request

        // $checkbox1 = $request->has('formats[]');
        // $checkbox2 = $request->has('formats[]');
        // $checkbox3 = $request->has('formats[]');

        // if ($checkbox1 || $checkbox2 || $checkbox3){
            
        // }else{
        //     var_dump($request);
        // }

        

        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'alpha|required',
            'publication_date' => 'date|required',
            'isbn' => ['required', 'unique:books']
        ]);

        Book::create($formFields);

        // $bookFormatController = new BookFormatController();
        // $bookFormatController->store($request);

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
