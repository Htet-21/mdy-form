@extends('layouts.admin-app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order List</h4>
            </div>
            <div class="card-body">

            </div>
            
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery CDN -->
<script type='text/javascript'>
    setInterval(function() {
        $('.card-body').load('/transaction-tables');
    }, 2000)
</script>

@endsection