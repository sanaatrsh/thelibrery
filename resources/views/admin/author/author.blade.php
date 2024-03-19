@extends('layouts.header')

@section('title')
    {{ $author->name }}
@endsection
<!-- Content Wrapper. Contains page content -->
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $author->name }}</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-body row">
                    <div class="col-5 text-center d-flex align-items-center justify-content-center">
                        <div class="">
                            @if ($author->image)
                                <img src="{{ asset('storage/' . $author->image) }}" alt="" width="60%"
                                    height="60%">
                            @else
                                <img src="{{ asset('images\manual-forensic-taphonomy-2nd-edition-pdf.jpg') }}"
                                    alt="" width="60%" height="60%">
                            @endif

                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <h5>Name</h5>
                            <h4>{{ $author->name }}</h4>
                        </div>

                        <div class="form-group">
                            <h5>Nationality</h5>
                            <h4>{{ $author->nationality }}</h4>
                        </div>

                        <div class="form-group">
                            <h5>Birth</h5>
                            <h4>{{ $author->birth }}</h4>
                        </div>
                        <div class="form-group">
                            <h5>biography</h5>
                            <p>{{ $author->biography }}</p>
                        </div>
                        <div class="form-group">
                            <h5>Books</h5>
                            @if ($author->books()->count())
                                @foreach ($author->books as $book)
                                    <ul>
                                        <li><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</li></a>

                                    </ul>
                                @endforeach
                            @else
                                <p>No Book For This Author</p>
                            @endif
                        </div>
                    </div>
                    @if (Auth::user())
                    <a class="btn btn-block btn-info" href="{{route('authors.edit', $author->id)}}">Edit</a>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-block btn-danger">Delete</button>
                    </form>
                    @endif
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
