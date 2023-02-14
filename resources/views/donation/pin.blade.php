@extends('layouts.main-app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <img id="yttc-bg" src="{{ asset('/images/dinger-bg.png') }}" alt="Dinger Image">
        <div id="yttc-form-div">

            <div class="container">
                <h1 id="yttc-title">Dinger Test Donation</h1>
                <br>
                <p style="color:dodgerblue;">Please check your donation data</p>
                <br>
                <p>Name : {{$donationData->name}}</p>
                <p>Phone : {{$donationData->phone}}</p>
                <p>Donation Amount = {{$donationData->amount}} MMK</p>

                <br>
                <p style="text-align:left;">{{$scan_pin}}</p>

                <div id="successful-content">

                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery CDN -->
                <script type='text/javascript'>
                    setInterval(function() {
                        $('#successful-content').load('/pin-getData/<?php echo $donationID; ?>');
                    }, 2000)
                </script>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection