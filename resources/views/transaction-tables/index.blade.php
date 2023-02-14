<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="{{ asset('images/parami-logo.jpg') }}" type="image/jpg" sizes="16x16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
    Paing's Courses | Admin Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{ asset('/css/admin-styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/demo/demo.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.css') }}" type="text/css" rel="stylesheet">

    <script src="{{ asset('/js/jquery.table2excel.js') }}"></script>
</head>

<body class="">
    <div id="back-to-dash">
        <a href="{{ url('/dashboard') }}">
            <- Back To Dashboard</a>
    </div>
    <div class="table-responsive">
        <table id="table2excel" class="table">
            <thead class=" text-primary">
                <tr>
                <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Transaction Status
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Courses
                        </th>
                        <th>
                            Order ID
                        </th>
                        <th class="text-right">
                            Detail >
                        </th>
                </tr>
            </thead>
            <tbody>
            @foreach($donation_lists as $donation_list)
                    <tr>
                    <td>
                            {{$donation_list->id}}
                        </td>
                        <td>
                            {{$donation_list->customer_name}}
                        </td>
                        <td>
                            {{$donation_list->transaction_status}}
                        </td>
                        <td>
                            {{$donation_list->amount}}
                        </td>
                        <td>
                            {{$donation_list->product_name}}
                        </td>
                        <td>
                            {{$donation_list->order_id}}
                        </td>

                        <td class="text-right">
                            <a href="/dashboard/{{$donation_list->id}}/donation-detail/"><input style="margin-top:10px;" class="btn btn-success" type="button" value="Detail >" /></a>
                        </td>

                </tr>
                @endforeach

            </tbody>
        </table>
        <div id="paginate-div">
            {{ $donation_lists ?? ''->links() }}
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('/demo/demo.js') }}"></script>

</body>

</html>