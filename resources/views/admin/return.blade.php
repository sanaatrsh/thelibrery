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
                        <h1>({{ $bookId->name }}) is Borrowed By

                            @foreach ($bookId->students as $student)
                                @if ($loop->last)
                                    <a href="{{ route('students.index', $student->id) }}"> {{ $student->first_name }}
                                        {{ $student->last_name }}( ID:{{ $student->university_id }} )</a>
                                @endif
                            @endforeach
                        </h1>
                        <form action="{{ route('books.postReturn', $bookId->id) }}" method="post">
                            @csrf
                            <button class="btn btn-block btn-primary">Return</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>





    </div>
    <!-- /.card-header -->
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
