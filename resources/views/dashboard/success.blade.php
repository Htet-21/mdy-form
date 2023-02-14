@extends('layouts.admin-app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery CDN -->
<script type='text/javascript'>
    setInterval(function() {
        $('.card').load('/transaction-tables/success');
    }, 2000)
</script>

@endsection