<?php

namespace App\Http\Controllers;

use App\Models\BookFormat;
use Illuminate\Http\Request;

class BookFormatController extends Controller
{
    // public function store(Request $request)
    // {
    //     // var_dump($request);
    //     $formFields = $request->validate([
    //         'book_id' => 'required',
    //         'format' => 'required',
    //     ]);
    //     // var_dump($request);
    //     BookFormat::create($formFields);

    //     return redirect('/')->with('message', 'Book added succesfully');
    // }


    public function store(Request $request)
    {
        $formFields = $request->validate([
            'book_id' => 'required',
            'formats' => 'required|array',
            'formats.*' => 'in:paperback,ebook,audiobook', // Ensure each format is one of these values
        ]);

        foreach ($formFields['formats'] as $format) {
            BookFormat::create([
                'book_id' => $formFields['book_id'],
                'format' => $format,
            ]);
        }

        return redirect('/')->with('message', 'Book added successfully');
    }
}
