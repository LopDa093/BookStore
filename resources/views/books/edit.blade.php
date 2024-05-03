@extends('layout')

@section('content')
<h2>Modify Book</h2>
    <form action="/books/{{$book->id}}" method="post">
        @csrf
        @method('PUT')
        {{-- Title Area --}}
        <div>
            <label for="title">Book Title</label>
            <input type="text" value="{{$book->title}}" name="title" />
            @error('title')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        {{-- Author Area --}}
        <div>
            <label for="author">Author Name</label>
            <input type="text" value="{{$book->author}}" name="author" />
            @error('author')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        {{-- Publication Date Area --}}
        <div>
            <label for="publication_date">Publication Date</label>
            <input type="date" value="{{$book->publication_date}}" name="publication_date" />
            @error('publication_date')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        {{-- ISBN Area --}}
        <div>
            <label for="isbn">ISBN</label>
            <input type="text" value="{{$book->isbn}}" name="isbn" />
            @error('isbn')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        <div >
            <button >
                Modify Book
            </button>

            
        </div>
        <a href="/"> Back </a>
    </form>



    <h2>Add new Review</h2>

    <form action="/reviews" method="post">
        @csrf
        @method('PUT')
        {{-- User Area --}}
        <input hidden type="number" value="{{$book->id}}" name="book_id" />
        <div>
            <label for="reviewer_name">Username</label>
            <input type="text" value="{{old('reviewer_name')}}" name="reviewer_name" />
            @error('reviewer_name')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        {{-- Rating Area --}}
        <div>
            <label for="rating">Rating (out of 5)</label>
            <input type="number" value="{{old('rating')}}" name="rating" />
            @error('rating')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        {{-- Review Area --}}
        <div>
            <label for="review">Review</label>
            <textarea type="text" value="{{old('review')}}" name="review"></textarea>
            @error('review')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        <div >
            <button >
                Add Review
            </button>

            
        </div>
    </form>
@endSection