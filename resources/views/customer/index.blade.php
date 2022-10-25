<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | DataTables</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body class="hold-transition">


        <!-- Main content -->
        <section class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-11">
                                        <h3 class="card-title"> Add Customers</h3>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{ route('customer.create') }}"
                                            class="btn btn-primary  btn-sm text-end">Add
                                            Data</a>
                                    </div>
                                </div>
                                {{-- <div class="row text-center">
                                <div class="col-4 mt-4 mx-3 my-3">
                                    <form method="GET">
                                        @csrf
                                        @method('GET')
                                        <div class="form-outline">
                                            <input type="search" name="id" id="search"
                                                class="form-control text-center" placeholder="Type query"
                                                aria-label="Search" />
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-primary" type="button">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Join At</th>
                                                <th>No Tlp</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        {{-- <tbody>
                                    
                                </tbody> --}}
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // DataTable
                var table = $('#example2').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    scrollY: true,
                    scrollCollapse: true,
                    paging: true,
                    searching: false,

                    // pagingType: 'full_numbers',
                    lengthChange: false,
                    ajax: {
                        url: "{{ route('customers.data') }}",
                        type: 'GET'
                    },
                    columns: [{
                            data: 'id',
                        },
                        {

                            data: 'name'
                        },
                        {
                            data: 'address'
                        },
                        {
                            data: 'no_tlp'
                        },
                        {
                            data: 'regis_at'
                        },
                        {
                            data: 'action'
                        },
                    ],
                });
                // setInterval(function() {
                //     table.ajax.reload();
                // }, 1000);
                $('#search').keyup(function() {
                    // alert("okke");
                    var data_searc_custome = $("#search").val();
                    console.log(data_searc_custome);
                    $.ajax({
                        url: '{{ route('customers.data') }}',
                        type: 'GET',
                        data: {
                            data_searc_custome: data_searc_custome
                        },
                        success: function(response) {
                            console.log(data_searc_custome);
                            // $('#something').html(response);
                            console.log(response);
                        }
                    });
                });
                $('body').on('click', '.deleteData', function() {

                    var Customer_id = $(this).data("id");
                    confirm("Are You sure want to delete !");

                    $.ajax({
                        type: "DELETE",
                        Method: 'DLEETE',
                        url: "" + '/delete/' + Customer_id,
                        success: function(data) {
                            console.log(data);
                            location.reload();
                        },
                        error: function(data) {
                            location.reload();
                            console.log('Error:', data);
                        }
                    });
                });
            });
        </script>
    </body>

    </html>

</x-app-layout>
