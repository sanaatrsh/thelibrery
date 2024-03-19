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
                        <h1>Add New ِAuther</h1>
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
                            <form method="POST" action="{{ route('authors.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="" class="form-control" id="name" name="name"
                                            placeholder="Enter name of the book">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectRounded0">Nationality</label>
                                        <select class="custom-select rounded-0" id="exampleSelectRounded0"
                                            name="nationality">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="birth">Birth</label>
                                        <input type="date" class="form-control" id="birth" name="birth"
                                            placeholder="Enter name of the birth date">
                                    </div>
                                    <div class="form-group">
                                        <label>Biography</label>
                                        <textarea name="biography" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
