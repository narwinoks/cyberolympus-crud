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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-11">
                                        <h3 class="card-title"> Detail Customers</h3>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{ route('customer.index') }}"
                                            class="btn btn-primary  btn-sm text-end">Back
                                            Data</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-header">
                                        Customer
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">{{ $data->name }}</li>
                                        <li class="list-group-item">{{ $data->address }}</li>
                                        <li class="list-group-item">{{ $data->regis_at }}</li>
                                        <li class="list-group-item">{{ $data->no_tlp }}</li>
                                    </ul>
                                </div>
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
    </body>

    </html>
</x-app-layout>
