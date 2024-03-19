@extends('layouts.header')

@section('title')
    {{ $book->name }}
@endsection
<!-- Content Wrapper. Contains page content -->
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $book->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $book->name }}</li>
                        </ol>
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
                            @if ($book->image)
                                <img src="{{ asset('storage/' . $book->image) }}" alt="" width="60%"
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
                            <h4>{{ $book->name }}</h4>
                        </div>
                        <div class="form-group">
                            <h5>Author</h5>
                            <h4>{{ $book->author->name }}</h4>
                            <a href="{{ route('authors.show', $book->author->id) }}">
                                <p>show author</p>
                            </a>
                        </div>
                        <div class="form-group">
                            <h5>Category</h5>
                            <h4>{{ $book->category->name }}</h4>
                        </div>
                        <div class="form-group">
                            <h5>Tags</h5>
                            <h4>{{ implode(', ', $book->tags()->pluck('name')->toArray()) }}</h4>
                        </div>
                        <div class="form-group">
                            <h5>Pages Number</h5>
                            <h4>{{ $book->pages_number }}</h4>
                        </div>
                        <div class="form-group">
                            <h5>Publisher</h5>
                            <h4>{{ $book->publisher }}</h4>
                            <p>{{ $book->publisher_date }}</p>
                        </div>
                        <div class="form-group">
                            <h5>Description</h5>
                            <p>{{ $book->description }}</p>
                        </div>
                        <div class="form-group">
                            <h5>Availability</h5>
                            <h4>{{ $book->availability }}</h4>
                        </div>
                    </div>
                    @if (Auth::user())
                        @if ($book->availability == 'available')
                            <a class="btn btn-block btn-primary" href="{{ route('books.borrow', $book->id) }}">Borrow</a>
                        @else
                            <a class="btn btn-block btn-secondary" href="{{ route('books.return', $book->id) }}">Return</a>
                        @endif
                        <a class="btn btn-block btn-info" href="{{ route('books.edit', $book->id) }}">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
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
