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
                        <h1>Books Borrowed by {{ $student->first_name }} {{ $student->last_name }}</h1>
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



                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>availability</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($student->books as $book)
                                            <tr>
                                                <td>
                                                    @if ($book->image)
                                                        <img src="{{ asset('storage/' . $book->image) }}" alt=""
                                                            height="50px">
                                                    @else
                                                        <img src="{{ asset('images\manual-forensic-taphonomy-2nd-edition-pdf.jpg') }}"
                                                            alt="" height="50px">
                                                    @endif
                                                </td>
                                                <td><a href='{{ route('books.show', $book->id) }}'>{{ $book->name }}</a>
                                                </td>
                                                <td>{{ $book->author->name }}</td>
                                                <td>{{ $book->category->name }}</td>
                                                {{-- <td></td> --}}
                                                <td>{{ $book->category->created_at }}</td>
                                                <td>{{ $book->availability }}</td>

                                                {{--  --}}
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9">No Books Yet!</td>
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
