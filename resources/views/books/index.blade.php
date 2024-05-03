@extends('layout')
@include('partials._search')
@section('content')
    <a href="/books/create">Add Book</a>
    @foreach ($books as $book)
        <div>
            <h2>{{ $book->title }}</h2>
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
                if ($count != 0) {
                    echo round($temp / $count, 1) . '/5';
                } else {
                    echo 'no ratings';
                }
                ?>
            </p>
            <a href="books/{{ $book->id }}">Details</a>
            <hr>
        </div>
    @endforeach
@endsection

<script defer>
    document.querySelector('input').addEventListener('keyup', filter);

    function filter(event) {
        let results;
        let rows = document.getElementsByTagName('div');
        //Call my own API which gives me all the Books
        fetch("http://localhost:8000/api/books").then((data) => data.json()).then(function(res) {
            results = res;
            // Iterate through each book
            for (let i = 0; i < rows.length - 1; i++) {
                // Check if what's inside the searchbar is also inside either the title or author
                if (results[i].title.includes(document.querySelector('input').value) || results[i].author
                .includes(document.querySelector('input').value)) {
                    //If it is inside revert the style changes
                    rows[i + 1].style.display = "";
                } else {
                    //Else make the Book invisible
                    rows[i + 1].style.display = "none";
                }
            }
        });
    }
</script>
