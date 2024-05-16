@extends('layout')

<div class="book-container">
    <h1>
        {{$book->title}}
    </h1>
    <p>Rating: 
        <?php
        //Get all the Reviews for this Book
        $reviews = $book->reviews;
        $count = 0;
        $temp = 0;
        //Add the Review Rating together
        foreach ($reviews as $review) {
            $temp += $review->rating;
            $count = $count + 1;
        }
        // If there are reviews divide by 5 else say "no ratings"
        if($count != 0){
            echo round($temp / $count,1)."/5";
        }else{
            echo "no ratings";
        }
        ?>
    </p>
    <p>Author: {{$book->author}}</p>
    <p>Publication Date: {{$book->publication_date}}</p>
    <p>ISBN: {{$book->isbn}}</p>
    <a href="/">Back</a>
    <a href="/books/{{$book->id}}/edit">Edit</a>
</div>

<h2 style="text-align: center; font-size:32px;">Reviews</h2>
@foreach ($reviews as $review)
<div class="book-container">
    <h2>User: {{$review->reviewer_name}} </h2>
    <p>Rating: {{$review->rating}} / 5</p>
    <p>Review: {{$review->review}}</p>
</div>
@endforeach
