<?php

namespace App\Http\Controllers;
use App\Models\BookReview;
use Illuminate\Http\Request;

class BookReviewController extends Controller
{
    public function store(Request $request)
    {
        //Validate Book
        $formFields = $request->validate([
            'book_id' => 'required',
            'reviewer_name' => 'required',
            'review' => 'required',
            'rating'=> 'numeric|between:1,5'
        ]);

        BookReview::create($formFields);

        return redirect('/')->with('message', 'Review added succesfully');
    }
}
