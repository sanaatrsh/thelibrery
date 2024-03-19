@extends('layouts.header')

@section('title')
Add student
@endsection
<!-- Content Wrapper. Contains page content -->
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add student</h1>
                    </div>
                    <form method="post" action="{{ route('students.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Password</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                            <div class="form-group">
                                <label for="university_id">University id</label>
                                <input type="number" class="form-control" id="university_id" name="university_id">
                            </div>
                            <div class="form-group">
                                <label for="birth">Birth</label>
                                <input type="date" class="form-control" id="birth" name="birth">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                            <div class="form-group">
                                <label for="major">Major</label>
                                <input type="text" class="form-control" id="major" name="major">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div><!-- /.container-fluid -->
        </section>


    </div>
@endsection
