@extends('layouts.header')

@section('title')
    add new book
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Book</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="color: white;">please input the info</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="" class="form-control" id="name" name="name"
                                            placeholder="Enter name of the book">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectRounded0">Author</label>
                                        <select class="custom-select rounded-0" id="exampleSelectRounded0" name="author_id">
                                            @foreach ($authors as $author)
                                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectRounded0">Category</label>
                                        <select class="custom-select rounded-0" id="exampleSelectRounded0"
                                            name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags">Tags</label>
                                        <input type="" class="form-control" id="tags" name="tags"
                                            value="{{ $tags }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="pages_number">Pages Number</label>
                                        <input type="number" min="0" class="form-control" id="pages_number"
                                            name="pages_number" placeholder="Enter name of the pages number">
                                    </div>
                                    <div class="form-group">
                                        <label for="publisher">Publisher</label>
                                        <input type="" class="form-control" id="publisher" name="publisher"
                                            placeholder="Enter name of the publisher">
                                    </div>
                                    <div class="form-group">
                                        <label for="publisher">Publishe Year</label>
                                        <input type="number" max="2030" min="1500" class="form-control"
                                            id="publisher_date" name="publisher_date"
                                            placeholder="Enter name of the publisher year">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image"
                                                    name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
        var inputElm = document.querySelector('[name=tags]'),
            tagify = new Tagify(inputElm);
    </script>
@endpush
