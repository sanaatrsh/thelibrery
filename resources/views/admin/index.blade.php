@extends('layouts.header')

@section('title')
    The Library
@endsection
<!-- Content Wrapper. Contains page content -->
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Welcome To The Library</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Books</h5>

                                <p class="card-text">
                                    Explore all the books that are in the library
                                </p>
                                <a href="{{ route('books.index') }}" class="card-link">Show Books</a>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Authers</h5>

                                <p class="card-text">
                                    Explore all the authers and their books.
                                </p>
                                <a href="{{ route('authors.index') }}" class="card-link">Show Authers</a>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">

                        @if (Auth::user())
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="card-title">Students</h5>

                                    <p class="card-text">
                                        show all the students who browed.
                                    </p>
                                    <a href="{{ route('students.index') }}" class="card-link">show students</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
@endsection
<!-- /.content-wrapper -->

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
