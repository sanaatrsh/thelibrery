@extends('layouts.header')

@section('title')
    authors
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
                        <h1>Authors</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">authors</li>
                        </ol>
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
                                @if (Auth::user())
                                <a href="{{ route('authors.create') }}" class="btn btn-block btn-primary btn-lg"
                                style="width: 200px;height: 50px">Add
                                New author
                            </a>
                            @endif

                            
                            
                        </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Birth</th>
                                            <th>Nationalty</th>
                                            <th>Books Number</th>
                                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($authors as $author)
                                            <tr>
                                                <td>
                                                    @if ($author->image)
                                                        <img src="{{ asset('storage/' . $author->image) }}" alt=""
                                                            height="50px">
                                                    @else
                                                        <img src="{{ asset('images\manual-forensic-taphonomy-2nd-edition-pdf.jpg') }}"
                                                            alt="" height="50px">
                                                    @endif
                                                </td>
                                                <td><a href='{{ route('authors.show', $author->id) }}'>{{ $author->name }}</a>
                                                </td>
                                                <td>{{ $author->birth }}</td>
                                                <td>{{ $author->nationality }}</td>
                                
                                                <td>{{ $author->books()->count()}}</td>
                                                {{-- <td></td> --}}
                                                
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9">No authors Yet!</td>
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
            {{ $authors->links() }} </ul>
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
