<?php

namespace App\Http\Controllers;

use App\Models\BookFormat;
use Illuminate\Http\Request;

class BookFormatController extends Controller
{
    
    public function store(Request $request)
    {
        
        $formFields = $request->validate([
            'book_id' => 'required',
            'format' => 'required',
            ]);

        BookFormat::create($formFields);

        return redirect('/')->with('message', 'Book added successfully');
    }
}
