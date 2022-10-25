<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- create table customers with ajax paggination and search --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customers</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group
                                ">
                                    <input type="text" name="search" id="search" class="form-control"
                                        placeholder="Search Customer">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">id</th>
                                        <th width="15%">Name</th>
                                        <th width="15%">address</th>
                                        <th width="15%">no_tlp</th>
                                        <th width="15%">regis_at</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <p id="ping"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('customer.table') }}",
                    method: 'GET',
                    data: {
                        query: query
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('tbody').html(data.table_data);
                        $('#ping').html("hallo" + data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }
            $(document).on('keyup', '#search', function() {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>

</body>

</html>
