@extends('layouts.header')

@section('title')
    students
@endsection
<!-- Content Wrapper. Contains page content -->
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Students</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-ti tle">DataTable with default features</h3> --}}

                                <a href="{{ route('students.create') }}" class="btn btn-block btn-primary btn-lg"
                                    style="width: 200px;height: 50px">Add
                                    New Student
                                </a>



                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>University id</th>
                                            <th>Major</th>
                                            <th>Birth</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($students as $student)
                                            <tr>

                                                <td>{{ $student->first_name }} {{ $student->last_name }}</a>
                                                </td>
                                                <td>{{ $student->university_id }}</td>
                                                <td>{{ $student->major }}</td>
                                                {{-- <td></td> --}} <td>{{ $student->birth }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->phone_number }}</td>
                                                <td>{{ $student->address }}</td>
                                                <td>
                                                    <form action="{{ route('books.postBorrow', [$book->id, $student->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-block btn-primary">select student</button>
                                                    </form>
                                                </td>


                                                {{--  --}}
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9">No students Yet!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <div style="align-items:center;" class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{ $students->links() }} </ul>
    </div>
@endsection
<!-- /.content-wrapper -->

<!-- Control Sidebar -->


@push('scripts')
    <script src="{{ asset('../../plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../../plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('../../plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src=".{{ asset('./../plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('../../plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    {{-- <!-- AdminLTE for demo purposes -->
    <script src="{{asset("../../dist/js/demo.js")}}"></script>
    <!-- Page specific script --> --}}
    <script>
        // $(function() {
        //     $("#example1").DataTable({
        //         "responsive": true,
        //         "lengthChange": false,
        //         "autoWidth": false,
        //         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        //     $('#example2').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": false,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //         "responsive": true,
        //     });
        // });
    </script>
@endpush
