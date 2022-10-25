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
                                        <h3 class="card-title"> Add Customers</h3>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{ route('customer.index') }}"
                                            class="btn btn-primary  btn-sm text-end">Back
                                            Data</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <form> --}}
                                <div class="fomr-group">
                                    <label for="" class="from-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="fomr-group">
                                    <label for="" class="from-label">Address</label>
                                    <input type="text" class="form-control" name="address" id="address">
                                </div>
                                <div class="fomr-group">
                                    <label for="" class="from-label">Join At</label>
                                    <input type="date" class="form-control" name="joinAt" id="joinAt">
                                </div>
                                <div class="fomr-group">
                                    <label for="" class="from-label">No tlp</label>
                                    <input type="number" class="form-control" name="noTlp" id="noTlp">
                                </div>
                                <div class="row mt-4 fomr-group">

                                    <button class="btn btn-primary btn-sm" id="butsave">Save</button>
                                </div>
                                {{-- </form> --}}
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
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#butsave').on('click', function() {
                    var name = $('#name').val();
                    var address = $('#address').val();
                    var regis_at = $('#joinAt').val();
                    var no_tlp = $('#noTlp').val();
                    // alert(no_tlp);
                    if (name != "" && address != "" && joinAt != "" && noTlp != "") {
                        /*  $("#butsave").attr("disabled", "disabled"); */
                        $.ajax({
                            url: "/store",
                            type: "POST",
                            data: {
                                _token: $("#csrf").val(),
                                type: 1,
                                name: name,
                                address: address,
                                regis_at: regis_at,
                                no_tlp: no_tlp
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/customers";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Error occured !");
                                }

                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    } else {
                        alert('Please fill all the field !');
                    }
                });
            });
        </script>
        </script>
    </body>

    </html>
</x-app-layout>
