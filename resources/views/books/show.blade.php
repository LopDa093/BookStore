<div>
    <h1>
        {{$book->title}}
    </h1>
    <p>Rating: 
        <?php
        $reviews = $book->reviews;
        $count = 0;
        $temp = 0;
        foreach ($reviews as $review) {
            $temp += $review->rating;
            $count = $count + 1;
        }
        if($count != 0){
            echo round($temp / $count,1)."/5";
        }else{
            echo "no ratings";
        }
        ?>
    </p>
    <p>{{$book->author}}</p>
    <p>{{$book->publication_date}}</p>
    <p>{{$book->isbn}}</p>
    <a href="/">Back</a>
    <a href="/books/{{$book->id}}/edit">Edit</a>
</div>

<h2>Reviews</h2>
@foreach ($reviews as $review)
<div>
    <h2>User: {{$review->reviewer_name}} </h2>
    <p>Rating: {{$review->rating}} /5</p>
    <p>Review: {{$review->review}}</p>
</div>
<hr>
@endforeach
