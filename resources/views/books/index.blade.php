@extends('layout')
@include('partials._search')
@section('content')
    <a href="/books/create">Add Book</a>
    @foreach ($books as $book)
        <div>
            <h2>{{ $book->title }}</h2>
            <p>Rating:
                <?php
                $reviews = $book->reviews;
                $count = 0;
                $temp = 0;
                foreach ($reviews as $review) {
                    $temp += $review->rating;
                    $count = $count + 1;
                }
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
        fetch("http://localhost:8000/api/books").then((data) => data.json()).then(function(res) {
            results = res;
            for (let i = 0; i < rows.length - 1; i++) {
                if (results[i].title.includes(document.querySelector('input').value) || results[i].author
                    .includes(document.querySelector('input').value)) {
                    rows[i + 1].style.display = "";
                } else {
                    rows[i + 1].style.display = "none";
                }
            }
        });
    }
</script>
