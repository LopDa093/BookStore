@extends('layout')

@section('content')
    <form action="/books" method="post">
        @csrf
        {{-- Title Area --}}
        <div>
            <label for="title">Book Title</label>
            <input type="text" value="{{ old('title') }}" name="title" />
            @error('title')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        {{-- Author Area --}}
        <div>
            <label for="author">Author Name</label>
            <input type="text" value="{{ old('author') }}" name="author" />
            @error('author')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        {{-- Publication Date Area --}}
        <div>
            <label for="publication_date">Publication Date</label>
            <input type="date" value="{{ old('publication_date') }}" name="publication_date" />
            @error('publication_date')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        {{-- ISBN Area --}}
        <div>
            <label for="isbn">ISBN</label>
            <input type="text" value="{{ old('isbn') }}" name="isbn" />
            @error('isbn')
                <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        {{-- Format Area --}}
        <div>
            <fieldset>
                <legend>Choose the Book's Format:</legend>

                <div>
                    <input type="checkbox" name="formats[]" value="paperback" {{ old('formats') && in_array('paperback', old('formats')) ? 'checked' : '' }} />
                    <label for="Paperback">Paperback</label>
                </div>

                <div>
                    <input type="checkbox" name="formats[]" value="ebook" {{ old('formats') && in_array('ebook', old('formats')) ? 'checked' : '' }} />
                    <label for="ebook">Ebook</label>
                </div>

                <div>
                    <input type="checkbox" name="formats[]" value="audiobook" {{ old('formats') && in_array('audiobook', old('formats')) ? 'checked' : '' }} />
                    <label for="audiobook">Audiobook</label>
                </div>

            </fieldset>
        </div>

        <div>
            <button>
                Create Book
            </button>


        </div>
        <a href="/"> Back </a>
    </form>
@endSection
